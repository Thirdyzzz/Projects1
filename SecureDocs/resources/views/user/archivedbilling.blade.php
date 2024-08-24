<script src="https://cdn.tailwindcss.com"></script>
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- timeline -->
                    <div class="bg-white rounded-lg shadow-xl mt-4 px-8">
                        <div class="bg-white dark:bg-white-100 overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-4 border-b">

                                <h2 class="text-2xl font-bold ">
                                    {{$clientData->client_fname}} {{$clientData->client_mname}}
                                    {{$clientData->client_sname}}'s Paid History
                                </h2>
                                <p class="text-sm text-gray-500">
                                    Client paid billing history.
                                </p>
                                <form action="{{route('clientarchivedhistory', $clientData)}}">
                                    <div class="grid grid-cols-2 gap-2 align-items-center justify-items-center">
                                        <div class="relative w-full mt-auto mb-auto">
                                            <input type="text" name="search" id="searchInput"
                                                value="{{request('search')}}"
                                                class="leading-snug border border-gray-300 block appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pr-8 rounded-lg pl-6 "
                                                placeholder="Search" />
                                            <div class="absolute inset-y-0 left-0 flex items-center pl-0 mt-1">
                                                <svg class="fill-current h-3 w-3 ml-2 mb-1"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
                                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                                        d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z">
                                                    </path>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="pl-20">
                                            <label>From:</label>
                                            <input type="date" name="date_from" class="border rounded pb-1 p-1">
                                            <label>To:</label>
                                            <input type="date" name="date_to" class="border rounded pb-1 p-1">
                                            <button type="submit"
                                                class="bg-purple-600 hover:bg-purple-800 text-white rounded p-1 pl-2 pr-2">Filter</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <div class="md:grid hover:bg-gray-50 md:space-y-0 space-y-1 p-4">
                                    <table id="dataTable" class="table-auto border-collapse w-full">
                                        <thead>
                                            <tr class=" text-sm font-medium text-gray-700 text-left"
                                                style="font-size: 0.9674rem">
                                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'id', 'order' => request('sort_by') == 'id' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Billing
                                                        id</a>
                                                </th>
                                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'case_id', 'order' => request('sort_by') == 'case_id' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Case
                                                        id</a>
                                                </th>
                                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'case_title', 'order' => request('sort_by') == 'case_title' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Case
                                                        title</a>
                                                </th>
                                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'b_clientbalance', 'order' => request('sort_by') == 'b_clientbalance' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Balance</a>
                                                </th>
                                                <th class="px-4 py-2 bg-gray-200" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'b_casetype', 'order' => request('sort_by') == 'b_casetype' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Case
                                                        type</a>
                                                </th>
                                                <th class="px-4 py-2" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'b_paymethod', 'order' => request('sort_by') == 'b_paymethod' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Pay
                                                        method</a>
                                                </th>
                                                <th class="px-4 py-2" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'bclient_paystatus', 'order' => request('sort_by') == 'bclient_paystatus' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Status</a>
                                                </th>
                                                <th class="px-4 py-2" style="background-color:#f8f8f8">
                                                    <a
                                                        href="{{ request()->fullUrlWithQuery(['sort_by' => 'updated_at', 'order' => request('sort_by') == 'updated_at' && request('order') == 'asc' ? 'desc' : 'asc']) }}">Date
                                                        archived</a>
                                                </th>

                                            </tr>
                                        </thead>
                                        @foreach($archivedBillings as $archivedBilling)
                                        <tbody class="text-sm font-normal text-gray-700">
                                            <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
                                                <td class="px-4 py-4">{{$archivedBilling->id}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->case_id}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->case_title}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->b_clientbalance !== null &&
                                                    $archivedBilling->b_clientbalance > 0 ? 'PHP ' .
                                                    $archivedBilling->b_clientbalance : 'PHP 0' }}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->b_casetype}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->b_paymethod}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->bclient_paystatus}}</td>
                                                <td class="px-4 py-4">{{$archivedBilling->updated_at}}</td>
                                            </tr>
                                            @endforeach

                                        </tbody>

                                    </table>
                                </div>
                                <div class="mt-4 p-4 sticky bottom-0 bg-white">
                                    {{ $archivedBillings->appends(['search' => request('search'),'date_from' =>
                                    request('date_from'),'sort_by' => request('sort_by'), 'order' =>
                                    request('order'),])->links() }}
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
</x-app-layout>