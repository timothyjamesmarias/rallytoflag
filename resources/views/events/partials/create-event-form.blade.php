<section>
  <header>
    <h2 class="text-lg font-medium text-gray-900">
        {{ __('Post A New Event') }}
    </h2>
  </header>

  <form method="POST" action="{{ route('event.store') }}"
  class="">
    @csrf

  </form> 

</section>
