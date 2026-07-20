<div id="{{ $id ?? 'planet-container' }}"
    style="width: 100%; height: {{ $height ?? '400px' }}; background: #000; position: relative; overflow: hidden;">
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/postprocessing/EffectComposer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/postprocessing/RenderPass.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/postprocessing/ShaderPass.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/postprocessing/UnrealBloomPass.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/shaders/CopyShader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/shaders/LuminosityHighPassShader.js"></script>

    <script>
        (function() {
            const container = document.getElementById('{{ $id ?? 'planet-container' }}');

            // Scene setup
            const scene = new THREE.Scene();
            scene.fog = new THREE.FogExp2(0x000000, 0.001);

            const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);
            camera.position.z = 9;

            const renderer = new THREE.WebGLRenderer({ antialias: true });
            renderer.setSize(container.offsetWidth, container.offsetHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            renderer.toneMapping = THREE.ReinhardToneMapping;
            renderer.toneMappingExposure = 2.3;
            container.appendChild(renderer.domElement);

            // Bloom effect for glow
            const bloomParams = {
                exposure: 1,
                bloomStrength: 1.5,
                bloomThreshold: 0,
                bloomRadius: 0.5
            };

            const renderScene = new THREE.RenderPass(scene, camera);
            const bloomPass = new THREE.UnrealBloomPass(
                new THREE.Vector2(container.offsetWidth, container.offsetHeight),
                bloomParams.bloomStrength,
                bloomParams.bloomRadius,
                bloomParams.bloomThreshold
            );

            const composer = new THREE.EffectComposer(renderer);
            composer.addPass(renderScene);
            composer.addPass(bloomPass);

            // Sun geometry and material
            const sunGeometry = new THREE.SphereGeometry(1.6, 64, 64);
            const sunTexture = new THREE.TextureLoader().load('{{ asset("textures/sun-texture.png") }}');

            // Animated sun surface
            const sunUniforms = {
                time: { type: "f", value: 0.0 },
                texture1: { type: "t", value: sunTexture }
            };

            const sunMaterial = new THREE.ShaderMaterial({
                uniforms: sunUniforms,
                vertexShader: `
                    varying vec2 vUv;
                    varying vec3 vNormal;
                    void main() {
                        vUv = uv;
                        vNormal = normalize(normalMatrix * normal);
                        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                    }
                `,
                fragmentShader: `
                    uniform float time;
                    uniform sampler2D texture1;
                    varying vec2 vUv;
                    varying vec3 vNormal;

                    void main() {
                        // Animate UVs for plasma effect
                        vec2 uv = vUv;
                        uv.x += sin(time * 0.1 + uv.y * 5.0) * 0.01;
                        uv.y += cos(time * 0.1 + uv.x * 5.0) * 0.01;

                        vec4 color = texture2D(texture1, uv);

                        // Edge glow based on normal
                        float intensity = pow(0.7 - dot(vNormal, vec3(0.0, 0.0, 1.0)), 2.0);
                        vec3 glow = vec3(1.0, 0.6, 0.2) * intensity * 0.5;

                        // Combine texture with glow
                        gl_FragColor = vec4(color.rgb + glow, color.a);
                    }
                `,
                side: THREE.FrontSide
            });

            const sun = new THREE.Mesh(sunGeometry, sunMaterial);
            scene.add(sun);

            // Sun corona (atmosphere)
            const coronaGeometry = new THREE.SphereGeometry(1.8, 64, 64);
            const coronaMaterial = new THREE.ShaderMaterial({
                uniforms: {
                    time: { type: "f", value: 0.0 }
                },
                vertexShader: `
                    varying vec3 vNormal;
                    void main() {
                        vNormal = normalize(normalMatrix * normal);
                        gl_Position = projectionMatrix * modelViewMatrix * vec4(position, 1.0);
                    }
                `,
                fragmentShader: `
                    uniform float time;
                    varying vec3 vNormal;

                    void main() {
                        float intensity = pow(0.8 - dot(vNormal, vec3(0.0, 0.0, 1.0)), 2.0);
                        vec3 coronaColor = mix(
                            vec3(1.0, 0.5, 0.2),
                            vec3(1.0, 0.8, 0.3),
                            intensity
                        );

                        // Add some turbulence
                        float turbulence = sin(time * 0.5 + vNormal.x * 10.0) * 0.1;
                        intensity += turbulence;

                        gl_FragColor = vec4(coronaColor * intensity * 0.8, intensity * 0.5);
                    }
                `,
                transparent: true,
                side: THREE.BackSide,
                blending: THREE.AdditiveBlending
            });

            const corona = new THREE.Mesh(coronaGeometry, coronaMaterial);
            scene.add(corona);

            // Solar flares particles
            const particleCount = 2000;
            const particles = new THREE.BufferGeometry();
            const positions = new Float32Array(particleCount * 3);
            const sizes = new Float32Array(particleCount);
            const colors = new Float32Array(particleCount * 3);

            const color = new THREE.Color();

            for (let i = 0; i < particleCount; i++) {
                // Random position in a sphere
                const radius = 2.0 + Math.random() * 1.5;
                const theta = Math.random() * Math.PI * 2;
                const phi = Math.random() * Math.PI * 2;

                positions[i * 3] = radius * Math.sin(phi) * Math.cos(theta);
                positions[i * 3 + 1] = radius * Math.sin(phi) * Math.sin(theta);
                positions[i * 3 + 2] = radius * Math.cos(phi);

                // Random size
                sizes[i] = 0.1 + Math.random() * 0.5;

                // Color gradient from yellow to red
                const hue = 0.1 + Math.random() * 0.1;
                color.setHSL(hue, 0.9, 0.5 + Math.random() * 0.2);
                colors[i * 3] = color.r;
                colors[i * 3 + 1] = color.g;
                colors[i * 3 + 2] = color.b;
            }

            particles.setAttribute('position', new THREE.BufferAttribute(positions, 3));
            particles.setAttribute('size', new THREE.BufferAttribute(sizes, 1));
            particles.setAttribute('color', new THREE.BufferAttribute(colors, 3));

            const particleMaterial = new THREE.PointsMaterial({
                size: 0.1,
                vertexColors: true,
                transparent: true,
                opacity: 0.8,
                blending: THREE.AdditiveBlending,
                sizeAttenuation: true
            });

            const particleSystem = new THREE.Points(particles, particleMaterial);
            scene.add(particleSystem);

            // Lighting
            const ambientLight = new THREE.AmbientLight(0x404040);
            scene.add(ambientLight);

            // Directional light for sun illumination
            const sunLight = new THREE.PointLight(0xffaa33, 2, 20);
            sunLight.position.set(0, 0, 0);
            scene.add(sunLight);

            // Simplified glow effect instead of lens flare
            const glowGeometry = new THREE.SphereGeometry(2.2, 32, 32);
            const glowMaterial = new THREE.MeshBasicMaterial({
                color: 0xffaa33,
                transparent: true,
                opacity: 0.2,
                side: THREE.BackSide,
                blending: THREE.AdditiveBlending
            });
            const glow = new THREE.Mesh(glowGeometry, glowMaterial);
            scene.add(glow);

            // Controls
            const controls = new THREE.OrbitControls(camera, renderer.domElement);
            controls.enableDamping = true;
            controls.dampingFactor = 0.05;
            controls.minDistance = 2.5;
            controls.maxDistance = 15;
            controls.autoRotate = true;
            controls.autoRotateSpeed = 0.5;

            // Handle window resize
            window.addEventListener('resize', () => {
                camera.aspect = container.offsetWidth / container.offsetHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.offsetWidth, container.offsetHeight);
                composer.setSize(container.offsetWidth, container.offsetHeight);
            });

            // Animation loop
            function animate() {
                requestAnimationFrame(animate);

                const time = Date.now() * 0.001;

                // Update sun animation
                sunUniforms.time.value = time;
                coronaMaterial.uniforms.time.value = time;

                // Rotate particles for solar flare effect
                particleSystem.rotation.y = time * 0.1;

                // Rotate sun
                sun.rotation.y += 0.002;

                // Pulsing glow effect
                glow.scale.setScalar(1 + Math.sin(time) * 0.05);

                controls.update();
                composer.render();
            }

            animate();
        })();
    </script>
@endpush
