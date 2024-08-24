<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                        </svg>
                                    </div>

                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Cases</div>
                                        <div class="font-bold text-lg">{{$data}}</div>
                                    </div>


                                </div>

                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-purple-100 text-purple-500">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-4">
                                        <div class="text-sm text-gray-500">Clients</div>
                                        <div class="font-bold text-lg">{{$client}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 sm:col-span-6 md:col-span-3">
                                <div class="flex flex-row bg-white shadow-sm rounded p-4">
                                    <div
                                        class="flex items-center justify-center flex-shrink-0 h-12 w-12 rounded-xl bg-white-100 text-purple-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                            data-name="Layer 1" viewBox="0 0 32 32" id="gmail">
                                            <path fill="#ea4435"
                                                d="M16.58,19.1068l-12.69-8.0757A3,3,0,0,1,7.1109,5.97l9.31,5.9243L24.78,6.0428A3,3,0,0,1,28.22,10.9579Z">
                                            </path>
                                            <path fill="#00ac47"
                                                d="M25.5,5.5h4a0,0,0,0,1,0,0v18a3,3,0,0,1-3,3h0a3,3,0,0,1-3-3V7.5a2,2,0,0,1,2-2Z"
                                                transform="rotate(180 26.5 16)"></path>
                                            <path fill="#ffba00"
                                                d="M29.4562,8.0656c-.0088-.06-.0081-.1213-.0206-.1812-.0192-.0918-.0549-.1766-.0823-.2652a2.9312,2.9312,0,0,0-.0958-.2993c-.02-.0475-.0508-.0892-.0735-.1354A2.9838,2.9838,0,0,0,28.9686,6.8c-.04-.0581-.09-.1076-.1342-.1626a3.0282,3.0282,0,0,0-.2455-.2849c-.0665-.0647-.1423-.1188-.2146-.1771a3.02,3.02,0,0,0-.24-.1857c-.0793-.0518-.1661-.0917-.25-.1359-.0884-.0461-.175-.0963-.267-.1331-.0889-.0358-.1837-.0586-.2766-.0859s-.1853-.06-.2807-.0777a3.0543,3.0543,0,0,0-.357-.036c-.0759-.0053-.1511-.0186-.2273-.018a2.9778,2.9778,0,0,0-.4219.0425c-.0563.0084-.113.0077-.1689.0193a33.211,33.211,0,0,0-.5645.178c-.0515.022-.0966.0547-.1465.0795A2.901,2.901,0,0,0,23.5,8.5v5.762l4.72-3.3043a2.8878,2.8878,0,0,0,1.2359-2.8923Z">
                                            </path>
                                            <path fill="#4285f4"
                                                d="M5.5,5.5h0a3,3,0,0,1,3,3v18a0,0,0,0,1,0,0h-4a2,2,0,0,1-2-2V8.5a3,3,0,0,1,3-3Z">
                                            </path>
                                            <path fill="#c52528"
                                                d="M2.5439,8.0656c.0088-.06.0081-.1213.0206-.1812.0192-.0918.0549-.1766.0823-.2652A2.9312,2.9312,0,0,1,2.7426,7.32c.02-.0475.0508-.0892.0736-.1354A2.9719,2.9719,0,0,1,3.0316,6.8c.04-.0581.09-.1076.1342-.1626a3.0272,3.0272,0,0,1,.2454-.2849c.0665-.0647.1423-.1188.2147-.1771a3.0005,3.0005,0,0,1,.24-.1857c.0793-.0518.1661-.0917.25-.1359A2.9747,2.9747,0,0,1,4.3829,5.72c.089-.0358.1838-.0586.2766-.0859s.1853-.06.2807-.0777a3.0565,3.0565,0,0,1,.357-.036c.076-.0053.1511-.0186.2273-.018a2.9763,2.9763,0,0,1,.4219.0425c.0563.0084.113.0077.169.0193a2.9056,2.9056,0,0,1,.286.0888,2.9157,2.9157,0,0,1,.2785.0892c.0514.022.0965.0547.1465.0795a2.9745,2.9745,0,0,1,.3742.21A2.9943,2.9943,0,0,1,8.5,8.5v5.762L3.78,10.9579A2.8891,2.8891,0,0,1,2.5439,8.0656Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-grow ml-2">
                                        @if (is_array($googleEvents) && !empty($googleEvents))
                                        <div class="text-sm text-gray-5500">Currently logged in</div>

                                        <!-- Display "Logout" if $googleEvents is not empty -->
                                        <div class="font-bold text-lg text-black"><a
                                                onclick="return confirm('Logout from gmail?')"
                                                href="{{ route('google.logout') }} ">Logout</a>
                                        </div>
                                        @else
                                        <div class="text-sm text-gray-5500">Log in to view events</div>

                                        <!-- Display "Login with Gmail" if $googleEvents is empty -->
                                        <div class="font-bold text-lg text-black"><a
                                                href="{{ route('google.login') }}">Login with Gmail</a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- start for horizontal align for charts -->
            <div class="my-4">
                <div class="bg-white rounded-md mt-4 p-2 flex item-center">
                    <div class="mr-auto my-auto ml-4 text-2xl font-bold">
                        <p> Summary Report </p>
                    </div>
                    <div class="ml-auto mt-4">
                        <form method="get" action="{{ url('/home') }}">
                            <label class="text-gray-700 text-md font-bold">Start Date </label>
                            <input type="date" name="startDate" id="startDate" value="{{$startDate}}"
                                class="rounded-md">
                            <label class="text-gray-700 text-md font-bold pl-4">End Date </label>
                            <input type="date" name="endDate" id="endDate" class="rounded-md mr-4" value="{{$endDate}}"
                                class="rounded-md">
                            <button id="filterButton"
                                class="px-4 py-2 bg-purple-600 text-white rounded-md mr-4">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="py-0">
                <div class="flex">
                    <!-- Section 1 -->
                    <div class="w-1/3 p-2 mx-auto">
                        <!-- Card 1 in Section 1 -->
                        <div class="bg-white rounded-lg p-4 mb-4 w-7x1">
                            <!-- Card 1 Content -->

                            <div class=" mx-auto">
                                <canvas id="myDonutChart"></canvas>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                var ctx = document.getElementById('myDonutChart').getContext('2d');
                                var myDonutChart = new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: @json($chartData['labels']),
                                        datasets: [{
                                            data: @json($chartData['data']),
                                            backgroundColor: [
                                                'rgb(255, 75, 145)',
                                                'rgb(61, 48, 162)',
                                                'rgb(255, 205, 75)',
                                            ],
                                        }],
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                position: 'top'
                                            }
                                        }
                                    }
                                });
                            });
                            </script>
                        </div>
                        <!-- ... (your existing code for other cards) ... -->
                    </div>

                    <!-- Section 2 -->
                    <div class="w-1/3 p-2 mx-auto">
                        <!-- Card 1 in Section 2 -->
                        <div class="bg-white rounded-lg p-4 mb-4 w-full">
                            <!-- Card 1 Content -->

                            <div class=" mx-auto">
                                <canvas id="myPieChart" style="max-width: 100%; height: auto;"></canvas>
                            </div>
                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                                    var ctx = document.getElementById('myPieChart').getContext('2d');
                                                    var myPieChart = new Chart(ctx, {
                                                        type: 'doughnut',
                                                        data: {
                                                            labels: @json($chartDataClient['labels']),
                                                            datasets: [{
                                                                data: @json($chartDataClient['data']),
                                                                backgroundColor: [
                                                                    'rgb(177, 94, 255)',
                                                                    'rgb(255, 163, 60)',

                                                                ],
                                                            }],
                                                        },
                                                        options: {
                                                            plugins: {
                                                                legend: {
                                                                    position: 'top'
                                                                }
                                                            }
                                                        }
                                                    });
                                                });
                            </script>
                            <!-- ... (your existing code for other cards) ... -->
                        </div>
                    </div>


                </div>
            </div>
            <!-- end for horizontal align for charts -->

            <!-- timeline -->

            <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 y p-8">
                <div class="grid grid-cols-2 gap-2 align-items-baseline">
                    <h4 class="text-xl  text-gray-900 font-bold justify-items-start py-3">Calendar events</h4>
                    <!-- Creates a vertical space -->
                    <!-- Date Range Filter Form -->
                    <form method="GET" action="{{ route('home')}}" class="inline-block" style="box-align: inherit">
                        <div style="float: right">
                            <div class="mb-4 inline-block">
                                <label for="start_from" class="block text-gray-700 text-sm font-bold mb-2">Start
                                    Date</label>
                                <input type="date" name="start_from" id="start_from" value="{{request('start_from')}}"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>

                            <div class="mb-4 inline-block">
                                <label for="end_to" class="block text-gray-700 text-sm font-bold mb-2">End
                                    Date</label>
                                <input type="date" name="end_to" id="end_to" value="{{request('end_to')}}"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>
                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg">Apply
                                Filter</button>
                        </div>
                    </form>
                </div>
                <div class="scrollable-content">

                    @if (is_array($googleEvents) && !empty($googleEvents))
                    @foreach ($googleEvents as $event)
                    <div class="relative px-3 py-1">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-1.5 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-purple-700 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <!-- Include the contents of google/calendar/index.blade.php with additional data -->
                                <p class="text-sm text-black"><a href="#" class="text-purple-600 font-bold">Google
                                        calendar event:</a> <strong class="text-orange-500"> {{ $event['summary'] }}
                                        {{ $event['description'] }} </strong>
                                <p class="text-xs text-gray-600">event at {{$event->start->dateTime}}</p>
                                <p class="text-xs text-gray-600">ends at {{$event->end->dateTime}}</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                    @endforeach
                    @else
                    <p>No Google Calendar events available.</p>
                    @endif
                </div>
                <style>
                    /* Add this CSS to your stylesheets */
                    .scrollable-content {
                        max-height: 300px;
                        /* Set your desired maximum height */
                        overflow-y: auto;
                    }
                </style>
            </div>

            <!-- timeline -->
            <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                <div class="grid grid-cols-2 gap-2 align-items-baseline">
                    <h4 class="text-xl  text-gray-900 font-bold justify-items-start">Activity log</h4>
                    <!-- Creates a vertical space -->
                    <!-- Date Range Filter Form -->
                    <form method="GET" action="{{ route('home') }}" class="inline-block" style="box-align: inherit">
                        <div style="float: right">
                            <div class="mb-4 inline-block">
                                <label for="start_date" class="block text-gray-700 text-sm font-bold mb-2">Start
                                    Date</label>
                                <input type="date" name="date_from" id="start_date" value="{{request('date_from')}}"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>

                            <div class="mb-4 inline-block">
                                <label for="end_date" class="block text-gray-700 text-sm font-bold mb-2">End
                                    Date</label>
                                <input type="date" name="date_to" id="end_date" value="{{request('date_to')}}"
                                    class="w-full px-3 py-2 border rounded-lg">
                            </div>
                            <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg">Apply
                                Filter</button>
                        </div>
                    </form>
                </div>
                <div class="scrollable-content">
                    @foreach ($recents as $recent)
                    <div class="relative px-3 py-1">
                        <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
                        <!-- start::Timeline item -->
                        <div class="flex items-center w-full my-1.5 -ml-1.5">
                            <div class="w-1/12 z-10">
                                <div class="w-3.5 h-3.5 bg-purple-700 rounded-full"></div>
                            </div>
                            <div class="w-11/12">
                                <p class="text-sm text-black"><a href="#"
                                        class="text-purple-600 font-bold">{{$recent->ra_filename}}</a> was <strong
                                        class="text-orange-500">{{$recent->ra_description}}</strong> by <a href="#"
                                        class="text-purple-600 font-bold">{{$recent->ra_by_author}}</a>.</p>
                                <p class="text-xs text-gray-600">Created at {{$recent->created_at}}</p>
                            </div>
                        </div>
                        <!-- end::Timeline item -->
                    </div>
                    @endforeach
                </div>
                <style>
                    /* Add this CSS to your stylesheets */
                    .scrollable-content {
                        max-height: 300px;
                        /* Set your desired maximum height */
                        overflow-y: auto;
                    }
                </style>
                <div class="mt-4 p-4 sticky bottom-0 bg-white">
                    {{ $recents->appends(['date_from' => request('date_from'), 'date_to' => request('date_to'),
                    'startDate' => request('startDate'), 'endDate' => request('endDate'), 'sort'
                    => request('sort'), 'order' => request('order')])->links() }}
                </div>
            </div>


        </div>
</x-app-layout>
