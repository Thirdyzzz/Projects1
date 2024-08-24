<x-app-layout>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form action="{{route('userclienttable')}}">
                            <!-- component -->
                            <div class="bg-white pb-4 px-4 rounded-md w-full">
                                <div class="w-full flex justify-between px-2 mt-2">
                                    <div class="text-left">
                                        <h2 class=" font-bold">Client Details</h2>
                                    </div>
                                    <div class="w-full sm:w-64 inline-block relative ">

                                        <input type="text" name="search" id="searchInput"
                                            class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg"
                                            placeholder="Search" />

                                        <div
                                            class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

                                            <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 511.999 511.999">
                                                <path
                                                    d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <div class="overflow-x-auto mt-6">
                            @csrf


                            <table id="dataTable" class="table-auto border-collapse w-full">
                                <thead>
                                    <tr class="rounded-lg text-sm font-medium text-gray-700 text-left"
                                        style="font-size: 0.9674rem">
                                        <th name="client_id" class="px-4 py-2 bg-gray-200 "
                                            style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_id', 'order' => request('sort_by') == 'client_id' && request('order') == 'asc' ? 'desc' : 'asc']) }}">ID
                                                #</a>
                                        </th>
                                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_fname', 'order' => request('sort_by') == 'client_fname' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Full
                                                Name</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_lawyer', 'order' => request('sort_by') == 'client_lawyer' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Client
                                                Lawyer</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_contactnum', 'order' => request('sort_by') == 'client_contactnum' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Contact
                                                #</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_emailadd', 'order' => request('sort_by') == 'client_emailadd' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Email</a>
                                        </th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_permadd', 'order' => request('sort_by') == 'client_permadd' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Address</a>
                                        </th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_type', 'order' => request('sort_by') == 'client_type' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Client
                                                Type</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'client_oppsfname', 'order' => request('sort_by') == 'client_oppsfname' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Opposing
                                                Client</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8">Action</th>
                                    </tr>
                                </thead>
                                @foreach($data as $row)
                                <tbody id="tableBody" class="text-sm font-normal text-gray-700">
                                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                        <td class="px-4 py-4">{{$row->client_id}}</td>
                                        <td class="px-4 py-4">{{$row->client_fname}} {{$row->client_mname}}
                                            {{$row->client_sname}}</td>
                                        <td class="px-4 py-4">{{$row->client_lawyer}}</td>
                                        <td class="px-4 py-4">{{$row->client_contactnum}}</td>
                                        <td class="px-4 py-4">{{$row->client_emailadd}}</td>
                                        <td class="px-4 py-4">{{$row->client_permadd}}</td>
                                        <td class="px-4 py-4">{{$row->client_type}}</td>
                                        <td class="px-4 py-4">{{$row->client_oppsfname}} {{$row->client_oppsmname}}
                                            {{$row->client_oppssname}}</td>
                                        <td class="px-4 py-4"><a
                                                href=" {{ route('clientfulldetails', ['id' => $row->client_id]) }}"
                                                class="text-blue-500">
                                             <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                    </svg>
                                            
                                        </a></td>
                                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 p-4 sticky bottom-0 bg-white">
                            {{ $data->appends(['search' => request('search'), 'sort_by' => request('sort_by'), 'order'
                            =>
                            request('order')])->links() }}
                        </div>
                    </div>

                    <style>
                        thead tr th:first-child {
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        thead tr th:last-child {
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }

                        tbody tr td:first-child {
                            border-top-left-radius: 10px;
                            border-bottom-left-radius: 10px;
                        }

                        tbody tr td:last-child {
                            border-top-right-radius: 10px;
                            border-bottom-right-radius: 10px;
                        }
                    </style>
                    <script>
                        const searchInput = document.getElementById("searchInput");
                            const dataTable = document.getElementById("dataTable");
                            const rows = dataTable.getElementsByTagName("tr");

                            searchInput.addEventListener("input", function() {
                                const searchTerm = searchInput.value.toLowerCase();

                                for (let i = 1; i < rows.length; i++) {
                                    const row = rows[i];
                                    let shouldShow = false;

                                    for (let j = 0; j < row.cells.length; j++) {
                                        const cellText = row.cells[j].textContent.toLowerCase();

                                        if (cellText.includes(searchTerm)) {
                                            shouldShow = true;
                                            break;
                                        }
                                    }

                                    if (shouldShow) {
                                        row.style.display = "";
                                    } else {
                                        row.style.display = "none";
                                    }
                                }
                            });
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- </x-app-layout> -->