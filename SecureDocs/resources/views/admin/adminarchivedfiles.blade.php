<x-app-layout>


    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form action="{{route('archivedfiletable')}}">
                        <!-- component -->
                        <div class="bg-white pb-4 px-4 rounded-md w-full">
                            <div class="w-full flex justify-between px-2 mt-2">
                                <div class="text-left">
                                    <h2 class=" font-bold">File Details</h2>
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
                                            <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_id', 'order' => request('sort_by') == 'file_id' && request('order') == 'asc' ? 'desc' : 'asc']) }}">File
                                                    ID #</a></th>
                                            <th name="file_name" class="px-4 py-2 bg-gray-200 "
                                                style="background-color:#f8f8f8"><a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_name', 'order' => request('sort_by') == 'file_name' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Title</a>
                                            </th>
                                            <th name="file_casetype" class="px-4 py-2 "
                                                style="background-color:#f8f8f8"><a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_casetype', 'order' => request('sort_by') == 'file_casetype' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Case
                                                    Type</a>
                                            </th>
                                            <th name="file_casestatus" class="px-4 py-2 "
                                                style="background-color:#f8f8f8">
                                                <a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_casestatus', 'order' => request('sort_by') == 'file_casestatus' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Case
                                                    Status</a>
                                            </th>
                                            <th name="file_authoredby" class="px-4 py-2 "
                                                style="background-color:#f8f8f8">
                                                <a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_authoredby', 'order' => request('sort_by') == 'file_authoredby' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Authored
                                                    By</a>
                                            </th>
                                            <th name="file_docketnum" class="px-4 py-2 "
                                                style="background-color:#f8f8f8"><a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_docketnum', 'order' => request('sort_by') == 'file_docketnum' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Docket
                                                    No.</a>
                                            </th>
                                            <th name="file_submittedby" class="px-4 py-2 "
                                                style="background-color:#f8f8f8">
                                                <a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'file_submittedby', 'order' => request('sort_by') == 'file_submittedby' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Submitted
                                                    By</a>
                                                @yield('name')
                                            </th>
                                            <th name="created_at" class="px-4 py-2 " style="background-color:#f8f8f8">
                                                <a
                                                    href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'order' => request('sort_by') == 'created_at' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Created
                                                    at</a>
                                            </th>


                                            <!-- <th class="px-4 py-2 " style="background-color:#f8f8f8">Action</th> -->
                                        </tr>
                                    </thead>
                                    @foreach($data as $row)
                                    <tbody id="tableBody" class="text-sm font-normal text-gray-700">
                                        <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                            <td class="px-4 py-4">{{$row->file_id}}</td>
                                            <td class="px-4 py-4">{{$row->file_name}}</td>
                                            <td class="px-4 py-4">{{$row->file_casetype}}</td>
                                            <td class="px-4 py-4">{{$row->file_casestatus}}</td>
                                            <td class="px-4 py-4">{{$row->file_authoredby}}</td>
                                            <td class="px-4 py-4">{{$row->file_docketnum}}</td>
                                            
                                            <td class="px-4 py-4">{{$row->file_submittedby}}</td>
                                            <td class="px-4 py-4">{{$row->created_at}}</td>
                                            <!-- <td class="px-4 py-4"><a
                                                    href=" {{ route('verify', ['id' => $row->file_id, 'file_client'=> $row->file_client ]) }}"
                                                    class="text-blue-500">View</a>   -->
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <div class="mt-4 p-4 sticky bottom-0 bg-white">
                                {{ $data->appends(['search' => request('search'), 'file_casetype' =>
                                request('file_casetype'),
                                'file_casestatus' => request('file_casestatus'), 'file_docketnum' =>
                                request('file_docketnum'),
                                'date_from' => request('date_from'), 'sort_by' => request('sort_by'), 'order' =>
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
                                border-top-left-radius: 5px;
                                border-bottom-left-radius: 0px;
                            }

                            tbody tr td:last-child {
                                border-top-right-radius: 5px;
                                border-bottom-right-radius: 0px;
                            }
                        </style>
                        <script>
                            // Table Script
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