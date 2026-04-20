<td class="px-6 py-4">
    <div class="flex justify-end gap-4">
        <a href="{{ route('admin.blog.categories.edit', $category) }}" class="text-orange-600 hover:text-orange-700">
            Editar
        </a>

        <form action="{{ route('admin.blog.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta categoría?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-700">
                Eliminar
            </button>
        </form>
    </div>
</td>