<div id="{{ $id ?? 'planet-container' }}"
    style="width: {{ $width ?? '100%' }}; height: {{ $height ?? '400px' }}; background: #000; position: relative; overflow: hidden;">
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>

    <script>
        (function() {
            const container = document.getElementById('{{ $id ?? 'planet-container' }}');

            const scene = new THREE.Scene();
            const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);

            const renderer = new THREE.WebGLRenderer({
                antialias: true,
                alpha: true
            });
            renderer.setSize(container.offsetWidth, container.offsetHeight);
            renderer.setPixelRatio(window.devicePixelRatio);
            container.appendChild(renderer.domElement);

            const geometry = new THREE.SphereGeometry(1.6, 64, 64);
            const texture = new THREE.TextureLoader().load('{{ $texture }}');
            const material = new THREE.MeshStandardMaterial({
                map: texture
            });
            const earth = new THREE.Mesh(geometry, material);
            scene.add(earth);

            const ambientLight = new THREE.AmbientLight(0x404040);
            scene.add(ambientLight);

            const directionalLight = new THREE.DirectionalLight(0xffffff, 1);
            directionalLight.position.set(5, 3, 5);
            scene.add(directionalLight);

            camera.position.z = 3;

            const controls = new THREE.OrbitControls(camera, renderer.domElement);
            controls.enableDamping = true;
            controls.dampingFactor = 0.05;
            controls.minDistance = 1.5;
            controls.maxDistance = 10;

            window.addEventListener('resize', () => {
                camera.aspect = container.offsetWidth / container.offsetHeight;
                camera.updateProjectionMatrix();
                renderer.setSize(container.offsetWidth, container.offsetHeight);
            });

            function animate() {
                requestAnimationFrame(animate);
                earth.rotation.y += 0.0001;
                controls.update();
                renderer.render(scene, camera);
            }
            animate();
        })();
    </script>
@endpush
