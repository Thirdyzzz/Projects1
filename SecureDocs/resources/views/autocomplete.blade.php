<script src="https://cdn.jsdelivr.net/gh/intellow/x-selectpicker/dist/x-selectpicker.js" defer></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.0/dist/cdn.min.js"></script>
<select id="people" class="x-selectpicker" placeholder="Choose a Name"
        result-class="cursor-pointer p-2 pl-4 border-2 rounded"
        dropdown-class="z-10 w-auto bg-white border border-gray-400 absolute inline-block max-w-2xl"
        option-class="px-4 py-3 cursor-pointer hover:bg-blue-100 border-b border-gray-200"
        search="true"
        search-class="pl-4 py-3 focus:outline-none text-xl border-b-4 border-blue-500"
        >
    @foreach($data as $data)
        <option value="1">{{$data->client_fname}}</option>
   @endforeach
</select>