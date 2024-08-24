<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="p-4 w-full">
                        <div class="grid grid-cols-9 gap-10 px-10">
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" width="1.5rem" height="1.5rem">
                                            <path strokeLinecap="round" strokeLinejoin="round" stroke-width="2"
                                                d="M5.25 8.25h15m-16.5 7.5h15m-1.8-13.5l-3.9 19.5m-2.1-19.5l-3.9 19.5" />
                                        </svg>
                                    </div>

                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Docket number</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_docketnum}}</div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" width="1.5rem" height="1.5rem">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Status</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_casestatus}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 6h.008v.008H6V6z" />
                                        </svg>

                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Casetype</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_casetype}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>

                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Client full name</div>
                                        <div class="font-bold text-lg"><a class="text-purple-500" href="{{ route('clientall', [
                                'client_id' => $viewfile->file_client
                            ]) }}">
                                                {{ $fromclientdata->client_sname }}, {{ $fromclientdata->client_fname }}
                                                {{ $fromclientdata->client_mname }}
                                            </a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                        </svg>

                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Client id number</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_client}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                        </svg>

                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">File number</div>
                                        <div class="font-bold text-lg"> {{$viewfile->file_id}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008zm0 3h.008v.008h-.008v-.008z" />
                                        </svg>


                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Court</div>
                                        <div class="font-bold text-lg"> {{$viewfile->file_court}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.217 10.907a2.25 2.25 0 100 2.186m0-2.186c.18.324.283.696.283 1.093s-.103.77-.283 1.093m0-2.186l9.566-5.314m-9.566 7.5l9.566 5.314m0 0a2.25 2.25 0 103.935 2.186 2.25 2.25 0 00-3.935-2.186zm0-12.814a2.25 2.25 0 103.933-2.185 2.25 2.25 0 00-3.933 2.185z" />
                                        </svg>


                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Branch</div>
                                        <div class="font-bold text-lg"> {{$viewfile->file_branch}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <!-- ... SVG path ... -->
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">File created</div>
                                        <div class="font-bold text-lg">{{$viewfile->created_at}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl
                                @if (Str::contains($viewfile->file_genID, 'Red'))
                                    bg-red-100 text-red-500
                                @elseif (Str::contains($viewfile->file_genID, 'Blu'))
                                    bg-blue-100 text-blue-500
                                @else
                                    bg-yellow-100 text-orange-500
                                @endif
                            ">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 6h.008v.008H6V6z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Docket ID</div>
                                        <div class="font-bold text-lg">
                                            <a href="
                                        @if (Str::contains($viewfile->file_genID, 'Red'))
                                            {{ route('docketred') }}
                                        @elseif (Str::contains($viewfile->file_genID, 'Blu'))
                                            {{ route('docketblu') }}
                                        @else
                                            {{ route('docketyel') }}
                                        @endif
                                    ">
                                                {{$viewfile->file_genID}}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-6">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Case details</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_casetypetype}}</div>
                                    </div>
                                    <div
                                        class="flex ml-16 items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Case Remark</div>
                                        <div class="font-bold text-lg">{{$viewfile->file_remarks}}</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- timeline -->
            <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                <div class="bg-white dark:bg-white-100 overflow-hidden shadow-sm sm:rounded-lg">
                    @php
                    $filePath = public_path('encfls/' . $viewfile->file);

                    // Check if the file exists
                    if (file_exists($filePath)) {
                    $fileContent = file_get_contents($filePath);
                    $decryptedContent = Crypt::decryptString($fileContent);
                    @endphp

                    <iframe src="data:application/pdf;base64,{{ base64_encode($decryptedContent) }}"
                        style="width:72vw;height:75vw;"></iframe>

                    @php
                    } else {
                    // Return an error message if the file doesn't exist
                    echo "File not found or readable. Please insert a .pdf file";
                    }
                    @endphp
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
