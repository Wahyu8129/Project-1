<aside class="w-64 bg-gray-800 text-white h-screen p-4">
            <h2 class="text-lg font-semibold mb-4">Menu</h2>
            <ul>
                <li class="mb-2"><a href="#" class="hover:text-blue-400">Dashboard</a></li>
                <li class="mb-2 dropdown">
                    <button onclick="toggleDropdown()" class="flex justify-between w-full text-left hover:text-blue-400">
                        Data
                        <svg class="w-4 h-4 transform transition-transform duration-200" id="dropdown-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <ul id="dropdown-menu" class="dropdown-content pl-4 hidden">
                        <li class="mb-2"><a href="/resep" class="hover:text-blue-400">Data Resep</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-blue-400">Data Transaksi</a></li>
                        <li class="mb-2"><a href="#" class="hover:text-blue-400">Data Produk</a></li>
                    </ul>
                </li>
                <li class="mb-2"><a href="#" class="hover:text-blue-400">Produk</a></li>
                <li class="mb-2"><a href="#" class="hover:text-blue-400">Laporan</a></li>
                <li class="mb-2"><a href="#" class="hover:text-blue-400">Pengaturan</a></li>
                <li class="mt-4 border-t border-gray-700 pt-4">
                    <a href="#" class="text-red-500 hover:text-red-400">Logout</a>
                </li>
            </ul>
        </aside>
        