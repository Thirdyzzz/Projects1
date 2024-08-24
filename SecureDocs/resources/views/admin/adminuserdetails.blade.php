<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- success handling -->
            @if (session()->has('message'))
            <div class="bg-[#6A64F1] text-white text-sm font-bold px-4 py-3" role="alert">

                <ul style="list-style-type: none; padding-left: 0;">
                    <!-- Apply inline style to remove list marker -->
                    <div class="flex items-center mb-2">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z" />
                        </svg>
                        {{ session()->get('message') }}
                    </div>
                </ul>
            </div>
            @endif
            <!-- end success handling -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        <form action="{{route('adminusertable')}}">
                            <!-- component -->
                            <div class="bg-white pb-4 px-4 rounded-md w-full">
                                <div class="w-full flex justify-between px-2 mt-2">
                                    <div class="text-left">
                                        <h2 class=" font-bold">User Details</h2>
                                        <div class="mb-4 inline-block">
                                            <label for="start_date"
                                                class="block text-gray-700 text-sm font-bold mb-2">Start
                                                Date</label>
                                            <input type="date" name="date_from" id="start_date"
                                                value="{{request('date_from')}}"
                                                class="w-full px-3 py-2 border rounded-lg">
                                        </div>

                                        <div class="mb-4 inline-block">
                                            <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End
                                                Date</label>
                                            <input type="date" name="date_to" id="end_date"
                                                value="{{request('date_to')}}"
                                                class="w-full px-3 py-2 border rounded-lg">
                                        </div>
                                        <button type="submit"
                                            class="bg-purple-600 text-white px-4 py-2 rounded-lg">Apply
                                            Filter</button>
                                    </div>

                                    <div class="w-full sm:w-64 inline-block relative mt-10">

                                        <input type="text" name="search" id="searchInput"
                                            class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg mt-10"
                                            placeholder="Search" />

                                        <div
                                            class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

                                            <svg class="fill-current h-3 w-3 mt-10" xmlns="http://www.w3.org/2000/svg"
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
                                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'order' => request('sort_by') == 'id' && request('order') == 'asc' ? 'desc' : 'asc']) }}">ID
                                                #</a></th>
                                        <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'name', 'order' => request('sort_by') == 'name' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Name</a>
                                        </th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'email', 'order' => request('sort_by') == 'email' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Email</a>
                                        </th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'email_verified_at', 'order' => request('sort_by') == 'email_verified_at' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Verified
                                                at</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'usertype', 'order' => request('sort_by') == 'usertype' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Usertype</a>
                                        </th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a
                                                href="{{ request()->fullUrlWithQuery(['sort_by' => 'created_at', 'order' => request('sort_by') == 'created_at' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Date
                                                created</a></th>
                                        <th class="px-4 py-2 " style="background-color:#f8f8f8"><a>Action</a></th>
                                    </tr>

                                </thead>
                                @foreach($data as $row)
                                <tbody id="tableBody" class="text-sm font-normal text-gray-700">
                                    <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                        <td class="px-4 py-4">{{$row->id}}</td>
                                        <td class="px-4 py-4">{{$row->name}}</td>
                                        <td class="px-4 py-4">{{$row->email}}</td>
                                        <td class="px-4 py-4">{{$row->email_verified_at}}</td>
                                        <td class="px-4 py-4">{{$row->usertype}}</td>
                                        <td class="px-4 py-4">{{$row->created_at}}</td>
                                        <td class="px-4 py-4" hidden>@php
                                            $user = Auth::user()->name;
                                            @endphp
                                            <?php echo $user;?>
                                        </td>
                                        <td class="px-4 py-4 flex">


                                            <a class="text-blue-500"
                                                href="{{ route('forceactivate', ['id' => $row->id, 'name' => $row->name, 'submittedby' => $user]) }}"
                                                onclick="return confirm('Continue to force activate this user?')">

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>

                                                <a class="text-blue-500"
                                                    href="{{ route('deleteuser', ['id' => $row->id, 'name' => $row->name, 'submittedby' => $user]) }}"
                                                    onclick="return confirm('Continue to delete this user?')">

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                        <div class="mt-4 p-4 sticky bottom-0 bg-white">
                            {{ $data->appends(['search' => request('search'),'date_from' => request('date_from'),
                            'date_to' => request('date_to'),
                            'sort_by' => request('sort_by'), 'order' =>
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