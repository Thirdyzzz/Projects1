<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
  <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
  @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script>
</head>
<body>
  <h1 class="text-3xl font-bold underline">
    Hello world!
  </h1>
</body>


<div class="container mt-3">
    <h1 class="mb-3">Laravel 10 Autocomplete Search using Bootstrap Typeahead JS - LaraTutorials</h1>   
    <input class="typeahead form-control" type="text">
</div>
   
<script type="text/javascript">
    var path = "{{ url('search-auto-db') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });
</script>









<!-- component -->
<div class="bg-white pb-4 px-4 rounded-md w-full">
      <div class="flex justify-between w-full pt-6 ">
        <p class="ml-3"> Users Table</p>
        <svg width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g opacity="0.4">
        <circle cx="2.19796" cy="1.80139" r="1.38611" fill="#222222"/>
        <circle cx="11.9013" cy="1.80115" r="1.38611" fill="#222222"/>
        <circle cx="7.04991" cy="1.80115" r="1.38611" fill="#222222"/>
        </g>
        </svg>

      </div>
  <div class="w-full flex justify-end px-2 mt-2">
        <div class="w-full sm:w-64 inline-block relative ">
          <input type="" name="" class="leading-snug border border-gray-300 block w-full appearance-none bg-gray-100 text-sm text-gray-600 py-1 px-4 pl-8 rounded-lg" placeholder="Search" />

          <div class="pointer-events-none absolute pl-3 inset-y-0 left-0 flex items-center px-2 text-gray-300">

            <svg class="fill-current h-3 w-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.999 511.999">
              <path d="M508.874 478.708L360.142 329.976c28.21-34.827 45.191-79.103 45.191-127.309C405.333 90.917 314.416 0 202.666 0S0 90.917 0 202.667s90.917 202.667 202.667 202.667c48.206 0 92.482-16.982 127.309-45.191l148.732 148.732c4.167 4.165 10.919 4.165 15.086 0l15.081-15.082c4.165-4.166 4.165-10.92-.001-15.085zM202.667 362.667c-88.229 0-160-71.771-160-160s71.771-160 160-160 160 71.771 160 160-71.771 160-160 160z" />
            </svg>
          </div>
        </div>
      </div>
    <div class="overflow-x-auto mt-6">

      <table class="table-auto border-collapse w-full">
        <thead>
          <tr class="rounded-lg text-sm font-medium text-gray-700 text-left" style="font-size: 0.9674rem">
            <th class="px-4 py-2 bg-gray-200 " style="background-color:#f8f8f8">Title</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8">Author</th>
            <th class="px-4 py-2 " style="background-color:#f8f8f8">Views</th>
          </tr>
        </thead>
        <tbody class="text-sm font-normal text-gray-700">
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-10">
            <td class="px-4 py-4">Intro to CSS</td>
            <td class="px-4 py-4">Adam</td>
            <td class="px-4 py-4">858</td>
          </tr>
          <tr class="hover:bg-gray-100 border-b border-gray-200 py-4">
            <td class="px-4 py-4 flex items-center"> 
            <svg xmlns="http://www.w3.org/2000/svg"   class="fill-current w-5 h-5 mr-5" viewBox="0 -98 512 512">
       <path d="M17.453 89.8h54.89c9.626 0 17.454-7.831 17.454-17.456v-54.89C89.797 7.831 81.969 0 72.344 0h-54.89C7.827 0 0 7.828 0 17.453v54.89c0 9.626 7.828 17.458 17.453 17.458zM15 17.454A2.457 2.457 0 0117.453 15h54.89a2.457 2.457 0 012.454 2.453v54.89a2.457 2.457 0 01-2.453 2.454h-54.89A2.457 2.457 0 0115 72.344zm0 0M494.547 0h-47.852c-4.14 0-7.5 3.36-7.5 7.5s3.36 7.5 7.5 7.5h47.852A2.457 2.457 0 01497 17.453v54.89a2.457 2.457 0 01-2.453 2.454H132.012a2.457 2.457 0 01-2.453-2.453v-54.89A2.457 2.457 0 01132.012 15h279.293c4.14 0 7.5-3.36 7.5-7.5s-3.36-7.5-7.5-7.5H132.012c-9.625 0-17.453 7.828-17.453 17.453v54.89c0 9.626 7.828 17.454 17.453 17.454h362.535c9.625 0 17.453-7.828 17.453-17.453v-54.89C512 7.827 504.172 0 494.547 0zm0 0M17.453 203.047h54.89c9.626 0 17.454-7.832 17.454-17.453v-54.89c0-9.626-7.828-17.458-17.453-17.458h-54.89C7.827 113.246 0 121.078 0 130.703v54.89c0 9.622 7.828 17.454 17.453 17.454zM15 130.703a2.458 2.458 0 012.453-2.457h54.89a2.458 2.458 0 012.454 2.457v54.89a2.457 2.457 0 01-2.453 2.454h-54.89A2.457 2.457 0 0115 185.594zm0 0M132.012 203.047h242.535c9.625 0 17.453-7.832 17.453-17.453v-54.89c0-9.626-7.828-17.458-17.453-17.458H184.699a7.5 7.5 0 00-7.5 7.5c0 4.145 3.356 7.5 7.5 7.5h189.848a2.458 2.458 0 012.453 2.457v54.89a2.457 2.457 0 01-2.453 2.454H132.012a2.457 2.457 0 01-2.453-2.453v-54.89a2.458 2.458 0 012.453-2.458h17.293a7.5 7.5 0 100-15h-17.293c-9.625 0-17.453 7.832-17.453 17.457v54.89c0 9.622 7.828 17.454 17.453 17.454zm0 0M72.344 226.496h-54.89C7.827 226.496 0 234.324 0 243.95v54.89c0 9.626 7.828 17.454 17.453 17.454h54.89c9.626 0 17.458-7.828 17.458-17.453v-10.996a7.5 7.5 0 00-7.5-7.5 7.497 7.497 0 00-7.5 7.5v10.996a2.458 2.458 0 01-2.457 2.453h-54.89A2.457 2.457 0 0115 298.84v-54.89a2.457 2.457 0 012.453-2.454h54.89a2.458 2.458 0 012.458 2.453v8.5a7.5 7.5 0 1015 0v-8.5c0-9.625-7.832-17.453-17.457-17.453zm0 0M494.547 226.496H132.012c-9.625 0-17.453 7.828-17.453 17.453v54.89c0 9.626 7.828 17.454 17.453 17.454h362.535c9.625 0 17.453-7.828 17.453-17.453v-54.89c0-9.626-7.828-17.454-17.453-17.454zM497 298.84a2.457 2.457 0 01-2.453 2.453H132.012a2.457 2.457 0 01-2.453-2.453v-54.89a2.457 2.457 0 012.453-2.454h362.535A2.457 2.457 0 01497 243.95zm0 0" data-original="#000000" data-old_color="#000000" />
       </svg>
            
             A Long and Winding Tour of the History of UI Frameworks and Tools and the Impact on Design</td>
            <td class="px-4 py-4">Adam</td>
            <td class="px-4 py-4">112</td>
          </tr>
          <tr class="hover:bg-gray-100  border-gray-200">
            <td class="px-4 py-4">Intro to JavaScript</td>
            <td class="px-4 py-4">Chris</td>
            <td class="px-4 py-4">1,280</td>
          </tr>
        </tbody>
      </table>
    </div>
  	 <div id="pagination" class="w-full flex justify-center border-t border-gray-100 pt-4 items-center">
        
        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g opacity="0.4">
<path fill-rule="evenodd" clip-rule="evenodd" d="M9 12C9 12.2652 9.10536 12.5196 9.29289 12.7071L13.2929 16.7072C13.6834 17.0977 14.3166 17.0977 14.7071 16.7072C15.0977 16.3167 15.0977 15.6835 14.7071 15.293L11.4142 12L14.7071 8.70712C15.0977 8.31659 15.0977 7.68343 14.7071 7.29289C14.3166 6.90237 13.6834 6.90237 13.2929 7.29289L9.29289 11.2929C9.10536 11.4804 9 11.7348 9 12Z" fill="#2C2C2C"/>
</g>
</svg>

        <p class="leading-relaxed cursor-pointer mx-2 text-blue-600 hover:text-blue-600 text-sm">1</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600" >2</p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 3 </p>
        <p class="leading-relaxed cursor-pointer mx-2 text-sm hover:text-blue-600"> 4 </p>
        <svg class="h-6 w-6" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" clip-rule="evenodd" d="M15 12C15 11.7348 14.8946 11.4804 14.7071 11.2929L10.7071 7.2929C10.3166 6.9024 9.6834 6.9024 9.2929 7.2929C8.9024 7.6834 8.9024 8.3166 9.2929 8.7071L12.5858 12L9.2929 15.2929C8.9024 15.6834 8.9024 16.3166 9.2929 16.7071C9.6834 17.0976 10.3166 17.0976 10.7071 16.7071L14.7071 12.7071C14.8946 12.5196 15 12.2652 15 12Z" fill="#18A0FB"/>
</svg>

      </div>
    </div>

<style>
  
thead tr th:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px;}
thead tr th:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px;}

tbody tr td:first-child { border-top-left-radius: 5px; border-bottom-left-radius: 0px;}
tbody tr td:last-child { border-top-right-radius: 5px; border-bottom-right-radius: 0px;}


</style>

<div class="py-1">
  <form method="POST" action="{{route ('crudtest')}}">
    @csrf put
                                  
                                  <input type="text" name="name" placeholder="enter name case"></input>
                                    <label
                                        for="email"
                                        class="mb-3 block text-base font-medium text-[#07074D]"
                                        >
                                       Case Identification
                                        </label>
                                        <ul class="items-center w-full text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-lg sm:flex">
                                            <!-- Row 1 -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="vue-checkbox-list" type="checkbox" name="casetype[]" value="Cybercrime" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="vue-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Cybercrime</label>
                                                </div>
                                            </li>

                                            <!-- New Row (Row 2) -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="checkbox-list-2" type="checkbox" value="Murder" name="casetype[]" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="checkbox-list-2" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Murder</label>
                                                </div>
                                            </li>

                                            <!-- Row 3 -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="angular-checkbox-list" type="checkbox" value="Burglary"  name="casetype[]" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="angular-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Burglary</label>
                                                </div>
                                            </li>

                                            <!-- Row 4 -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="laravel-checkbox-list" type="checkbox" value="Rape"  name="casetype[]" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="laravel-checkbox-list" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Rape</label>
                                                </div>
                                            </li>

                                            <!-- Row 5 -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="checkbox-list-5" type="checkbox" value="Assault"  name="casetype[]" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="checkbox-list-5" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Assault</label>
                                                </div>
                                            </li>

                                            <!-- Row 6 -->
                                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                                <div class="flex items-center pl-3">
                                                    <input id="checkbox-list-6" type="checkbox" value="Theft" name="casetype[]" class="w-4 h-4 text-blue-600 bg-white-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2 bg-gray-200">
                                                    <label for="checkbox-list-6" class="w-full py-3 ml-2 text-sm font-medium text-gray-900">Theft</label>
                                                </div>
                                            </li>
                                        </ul>
                                        
                                      <button  type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        submit
                                      </button>

                                  
</form>
    <!-- <div class="">
      <button
        data-modal-toggle="example"
        data-modal-action="open"
        class="bg-blue-600 font-semibold text-white p-2 w-32 rounded hover:bg-blue-800 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
      >
        Click here
      </button>

      <button
        data-modal-toggle="example2"
        data-modal-action="open"
        class="bg-orange-600 font-semibold text-white p-2 w-32 rounded-full hover:bg-purple-700 focus:outline-none focus:ring shadow-lg hover:shadow-none transition-all duration-300 m-2"
      >
        Click here
      </button>
    </div>

   ?
  

<!<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Color
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Category
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <div class="flex items-center">
                        Price
                        <a href="#"><svg class="w-3 h-3 ml-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
    <path d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z"/>
  </svg></a>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Apple MacBook Pro 17"
                </th>
                <td class="px-6 py-4">
                    Silver
                </td>
                <td class="px-6 py-4">
                    Laptop
                </td>
                <td class="px-6 py-4">
                    $2999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Microsoft Surface Pro
                </th>
                <td class="px-6 py-4">
                    White
                </td>
                <td class="px-6 py-4">
                    Laptop PC
                </td>
                <td class="px-6 py-4">
                    $1999
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white dark:bg-gray-800">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Magic Mouse 2
                </th>
                <td class="px-6 py-4">
                    Black
                </td>
                <td class="px-6 py-4">
                    Accessories
                </td>
                <td class="px-6 py-4">
                    $99
                </td>
                <td class="px-6 py-4 text-right">
                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
-->


<!-- 
</table>

<select name="countries" id="countries" multiple>
    <option value="1">Afghanistan</option>
    <option value="2">Australia</option>
    <option value="3">Germany</option>
    <option value="4">Canada</option>
    <option value="5">Russia</option>
</select>

<script>
    new MultiSelectTag('countries')  // id
</script>
 -->


</html>

<script>
    const modal = (el) => {
      const toggle = (wrapperEl, mainEl) => {
        document.querySelector('body').classList.toggle('overflow-y-hidden');
        wrapperEl.classList.toggle('opacity-100');
        wrapperEl.classList.toggle('opacity-0');
        wrapperEl.classList.toggle('visible');
        wrapperEl.classList.toggle('invisible');
        mainEl.classList.toggle('-translate-y-full');
        mainEl.classList.toggle('translate-y-0')
      };

      const extractElements = (target) => {
        const wrapper = document.querySelector(`[data-modal='${target}']`);
        const modal = wrapper.querySelector('[data-modal-main]');
        return { wrapper, modal };
      };

      const showEvent = new CustomEvent('show', {
        detail: {},
        bubbles: true,
        cancelable: true,
        composed: false,
      });

      const hideEvent = new CustomEvent('hide', {
        detail: {},
        bubbles: true,
        cancelable: true,
        composed: false,
      });

      if (!document.querySelector('[data-modal-toggle]')) {
        return;
      }

      if (!document.querySelector('[data-modal')) {
        return;
      }

      [...document.querySelectorAll('[data-modal-toggle]')].forEach((btn) =>
        btn.addEventListener('click', (event) => {
          event.preventDefault();
          const action = btn.getAttribute('data-modal-action');
          const target = btn.getAttribute('data-modal-toggle');
          const { wrapper, modal } = extractElements(target);

          if (action === 'open') {
            modal.dispatchEvent(showEvent);
          }
          if (action === 'close') {
            modal.dispatchEvent(hideEvent);
          }
          toggle(wrapper, modal);
        })
      );
    };

    // init
    modal();

    // Custom event listeners

    // This event fires immediately before the modal is start showing
    document.querySelector('[data-modal="example"]').addEventListener('show', (event) => {
      const sayHi = ['Hola', 'Zdravstvuyte', 'Salve', 'Konnichiwa', 'Guten Tag', 'Olá'];
      const randomNum = Math.floor(Math.random() * sayHi.length); 
      document.querySelector('#exampleHeader').innerText = sayHi[randomNum];
      console.log('show');
    });

    // This event is fired immediately before modal is start hidding
    document.querySelector('[data-modal="example"]').addEventListener('hide', (event) => {
      console.log('hide');
    });
  </script>