<x-layout>

    <x-setting heading="All Recipes"> 
      <!-- This example requires Tailwind CSS v2.0+ -->
<div class="flex flex-col mt-5">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
      
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($recipes as $recipe)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 h-10 w-10">
                          <img class="h-10 w-10 rounded-full" src="{{$recipe->getThumbnail()}}" alt="">
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                              <a href="{{route('recipes.show', $recipe)}}">
                                {{$recipe->title}}
                              </a>
                          </div>
                        </div>
                      </div>
                    </td>
               
                  
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                      <a href="{{route('admin.recipes.edit', $recipe->id)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <form method="POST" action="{{route('admin.recipes.destroy', $recipe)}}">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-900" type="submit">Delete</button>
                        </form>
                      </td>
                  </tr>
                @endforeach
                 
            </tbody>
          </table>
          <div class="mt-5 p-5">
            {{$recipes->links()}}
          </div>
          
        </div>
      </div>
    </div>
  </div>
  
    </x-setting>
  </x-layout>
  