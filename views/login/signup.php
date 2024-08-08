<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/16fc208515.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Registro | POS</title>
</head>


<body>
    <div
        class="bg-[url('./public/img/degradado.jpg')] bg-center absolute top-0 left-0 bottom-0 leading-5 h-full w-full overflow-hidden">
    </div>
    <div class="relative sm:flex sm:flex-row justify-center min-h-[100vh] p-16 rounded-3xl shadow-xl">
        <div class="flex-col flex self-center sm:max-w-4xl p-4 lg:max-w-[100%] z-10">
            <div class="self-start hidden lg:flex flex-col text-white">
                <h1 class="my-3 pr-8 font-semibold text-4xl">Solution POS, el sistema más completo del mercado.</h1>
                <p class="pr-3 text-md opacity-75">Ingresa tus datos y empieza a usar la app.</p>
            </div>
        </div>
        <div class="flex justify-center self-center z-10">
            <div class="p-12 bg-white shadow-xl rounded-3xl w-96">
                <div class="mb-5">
                    <h3 class="font-semibold text-center text-3xl text-gray-800">Crear cuenta</h3>
                    <p class="text-[13px] text-center">Llena los campos para obtener un registro exitoso.</p>
                </div>
                
                <?php if ($this->hasMessages()): ?>
                <div class="notificacion">
                    <div class="notificacion_body">
                        <?php $this->showMessages(); ?>
                        <i class="fa-solid fa-circle-xmark" style="color: #df0707;"></i>
                    </div>
                    <div class="progreso_notificacion"></div>
                </div>
                <?php endif; ?>

                <form action="<?php echo constant('URL'); ?>/signup/newUser" method="POST" class="space-y-6">
                    <div>
                        <input
                            class="w-full text-sm px-4 py-3 bg-gray-200 focus:bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-azul text-azul_oscuro"
                            type="text" name="usuario" placeholder="Email">
                    </div>
                    <div class="relative" x-data="{ show: true }">
                        <input name="contraseña" placeholder="Contraseña" :type="show ? 'password' : 'text'"
                            class="text-sm text-azul_oscuro px-4 py-3 rounded-lg w-full bg-gray-200 focus:bg-gray-100 border border-gray-200 focus:outline-none focus:border-purple-400">
                        <div class="flex items-center absolute inset-y-0 right-0 mr-3 text-sm leading-5">
                            <svg @click="show = !show" :class="{'hidden': !show, 'block':show }"
                                class="h-4 text-purple-700" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 576 512">
                                <path fill="currentColor"
                                    d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                </path>
                            </svg>
                            <svg @click="show = !show" :class="{'block': !show, 'hidden':show }"
                                class="h-4 text-purple-700" fill="none" xmlns="http://www.w3.org/2000/svg"
                                viewbox="0 0 640 512">
                                <path fill="currentColor"
                                    d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="text-sm ml-auto">
                            <a href="#" class="text-azul hover:text-blue-600">¿Olvidaste tu Contraseña?</a>
                        </div>
                    </div>
                    <div class="flex flex-col gap-2">

						<button type="submit"
							class="w-full flex justify-center bg-[#615EFC] hover:bg-[#1A2130] text-gray-100 p-3 rounded-lg tracking-wide font-semibold cursor-pointer transition ease-in duration-500">Crear cuenta</button>

						<a href="index"
							class="w-full flex justify-center bg-transparent hover:bg-[#1A2130] hover:text-white text-[#1A2130] p-3 rounded-lg tracking-wide font-semibold cursor-pointer transition ease-in duration-500">Entrar</a>

					</div>
                </form>
                <footer class="pt-10">
                    <p class="text-[10px] text-center font-medium"><a href="https://www.solutioncodeco.com"
                            target="_blank" class="text-azul font-bold">SolutionCode</a> | Todos los derechos reservados
                        Sami Salud <span id="año">2024.</span></p>
                </footer>
            </div>
        </div>
    </div>
    <footer class="bg-transparent absolute w-full bottom-0 left-0 z-30"></footer>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
    <script src="assets/main.js"></script>
</body>

</html>