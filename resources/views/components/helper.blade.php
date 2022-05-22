@php
switch ($position) {
case 'top-left':
$position = "top-0 left-0";
break;
case 'top-right':
$position = "top-0 right-0";
break;
case 'bottom-left':
$position = "bottom-0 left-0";
break;
default:
$position = "bottom-0 right-0";
break;
}
@endphp

<div class="fixed {{ $position  }} z-50 bg-white rounded"
     x-data="helper('{{ $icons  }}')">

    <div class="p-2">
        <div class="flex items-center space-x-2 "
             @click="open =! open">
            <svg class="w-4 h-4"
                 viewBox="0 0 145 142"
                 fill="none"
                 xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M140.945 24.3204C139.308 24.4034 137.66 24.4455 136.002 24.4455C111.414 24.4455 88.9851 15.2018 72.0006 0C55.0162 15.2012 32.5876 24.4445 8.00013 24.4445C6.34229 24.4445 4.69428 24.4025 3.05708 24.3194C1.06165 32.0285 0 40.1133 0 48.4462C0 93.179 30.595 130.766 72.0012 141.423C113.407 130.766 144.002 93.179 144.002 48.4462C144.002 40.1137 142.941 32.0291 140.945 24.3204ZM72.0011 122.691C103.346 112.569 126.002 83.1327 126.002 48.4462C126.002 46.2694 125.913 44.1161 125.74 41.9893C105.94 40.2201 87.5841 33.3832 72.0004 22.7956C56.4171 33.3826 38.0612 40.2192 18.2628 41.9883C18.089 44.1155 18.0003 46.2691 18.0003 48.4462C18.0003 83.1327 40.6564 112.569 72.0011 122.691Z"
                      fill="#CABFFD" />
            </svg>
            <span x-show="open"
                  class="text-sm">
                Hero Icons
            </span>
        </div>

        <template x-if="open">
            <div x-show="open"
                 class="mt-2">

                <input x-ref="searchField"
                       x-model="search"
                       type="text"
                       name="search"
                       id=""
                       placeholder="Search"
                       class="text-sm px-4 py-2 rounded border border-gray-200 w-full mb-2">

                <div class="results h-96 w-96 overflow-scroll p-2 border bg-white"
                     x-show="search != '' ">
                    <div class="flex justify-center gap-4">
                        <div>
                            <h3 class="mb-1 text-xs font-bold">Outline</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <template x-for="(icon, index) in filteredIcons">
                                    <div class="text-xs bg-white p-2 border border-gray-200 w-full"
                                         @click="copyIcon(icon,'outline')">
                                        <span x-text="icon"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <div>
                            <h3 class="mb-1 text-xs font-bold">Solid</h3>
                            <div class="grid grid-cols-2 gap-2">
                                <template x-for="(icon, index) in filteredIcons">
                                    <div class="text-xs bg-white p-2 border border-gray-200 w-full"
                                         @click="copyIcon(icon, 'solid')">
                                        <span x-text="icon">
                                        </span>
                                    </div>
                                </template>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </template>
    </div>

</div>
