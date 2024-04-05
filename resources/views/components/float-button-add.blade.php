<form @style(['border:none;','margin:0;','padding:0;']) class="hexagon hover:bg-orange-300 group" action="{{ $createRoute }}" method="post">
    @csrf
    <button type="submit">
        <i class="material-icons text-center text-[0.1rem] text-orange-50">add</i>
    </button>
</form>