<!-- Navigation Menu -->
<div class="flex flex-col justify-center items-center align-middle gap-3 mb-6 -mt-3">
    <!-- <h2 class="text-lg font-bold ">Navigation Menu </h2> -->
    <div class="flex flex-row justify-center items-center gap-3">
        <?php
            echo renderNavMenu([
                ['label' => 'Home', 'href' => $path_to_root, 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
                // ['label' => 'Card', 'href' =>  $path_to_root.'card', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
                [
                    'label' => 'Components',
                    'href' => '',
                    'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2 relative group cursor-pointer',
                    'submenu' => [
                        ['label' => 'Catd', 'href' => $path_to_root.'card', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Button', 'href' => $path_to_root.'button', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Badge', 'href' => $path_to_root.'badge', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Input', 'href' => $path_to_root.'input', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Label', 'href' => $path_to_root.'label', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Dialog', 'href' => $path_to_root.'dialog', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'New Dialog', 'href' => $path_to_root.'new-dialog', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                        ['label' => 'Combobox', 'href' => $path_to_root.'combobox', 'class' => 'block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100'],
                    ],
                    'submenuClass' => 'absolute left-0 mt-2 hidden group-hover:block bg-white shadow-lg rounded-md z-50 min-w-[180px]'
                ],
                // ['label' => 'Contact', 'href' => '/contact', 'class' => 'text-gray-700 hover:text-blue-600 transition px-4 py-2'],
            ], 'flex items-center space-x-4 bg-white p-4 rounded-lg shadow-md');
        ?>
    </div>
</div>