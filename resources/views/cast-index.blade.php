<x-app-layout>
<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
<div class="bg-white p-8 rounded-md w-full">
	<div class=" flex items-center justify-between pb-6">
		<div>
			<h2 class="text-gray-600 font-semibold">Products Oder</h2>
			<span class="text-xs">All products item</span>
		</div>
		<div class="flex items-center justify-between">
			<div class="flex bg-gray-50 items-center p-2 rounded-md">
				<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
					fill="currentColor">
					<path fill-rule="evenodd"
						d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
						clip-rule="evenodd" />
				</svg>
				<form action="">
				<input class="bg-gray-50 outline-none ml-1 block " type="text" name="" id="" placeholder="search...">
				</form>
          </div>
				@role('admin')
				<div class="lg:ml-40 ml-10 space-x-8">
					<form action="{{ route('admin.casts.create')}}">
          <x-button>Add Cast</x-button>
				</form>
				</div>
				@endrole
			</div>
		</div>
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					<table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Name
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Birthday
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Slug
								</th>
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                  Poster
								</th>
								@role('admin')
								<th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Manage
								</th>
								@endrole
							</tr>
						</thead>
						<tbody>
						
							@foreach ($casts as $cast)
							
							<tr>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<div class="flex items-center ml-3">
												<p class="text-gray-900 whitespace-no-wrap">
												{{ $cast->name }}	
												</p>
									</div>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
									{{ $cast->birthday}}</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
									{{ $cast->slug }}	
									</p>
								</td>
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<p class="text-gray-900 whitespace-no-wrap">
									{{ $cast->poster_path}}
									</p>
								</td>
								@role('admin')
								<td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
									<a  href="{{ route('admin.casts.edit', $cast->id)}}" class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight rounded-full hover:bg-green-500">
										<span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
										<button class="relative">Edit</button>
									</a>
									<form id="" action="{{ route('admin.casts.delete', $cast->id)}}" method="POST" class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight rounded-full hover:bg-red-500" onsubmit="return confirm('are you sure?')">
										@csrf
										@method('DELETE')

										<span aria-hidden class="absolute inset-0 bg-red-200 opacity-50  rounded-full "></span>
										<button onclick="" class="relative ">Delete</button>
									</form>
								</td>
								@endrole
							</tr>@endforeach
						
						</tbody>
					</table>
					<div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
						<span class="text-xs xs:text-sm text-gray-900">
							{{ $casts->onEachSide(1)->links() }}
                        </span>
						<div class="inline-flex mt-2 xs:mt-0">
						</div>
					</div>
					
				</div>
	@if (session('success'))
		<div id="log-message" class="alert alert-success bg-green-200 rounded px-3 py-1 text-green-900 font-semibold">
			{{ session('success') }}
		</div>
	@elseif(session('error'))
		<div id="log-message" class="alert alert-success bg-red-200 rounded px-3 py-1 text-red-900 font-semibold">
			{{ session('error') }}
		</div>
	@endif
	<script>
		document.addEventListener('DOMContentLoaded', (event) => {
			setTimeout(() => {
				document.getElementById('log-message').style.display = 'none';
			}, 3000);
		});
	</script>
			</div>
		</div>
	</div>
</div>


</x-app-layout>