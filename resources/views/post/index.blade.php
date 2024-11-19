<td class="text-center">

    @can('edit posts', Post::class)
        <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm btn-primary">EDIT</a>
    @endcan

    @can('delete posts', Post::class)
        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $post->id) }}" method="POST">

            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
        </form>

    @endcan

    @can('publish posts', Post::class)
    <form onsubmit="return confirm('Publish post ini?');" action="{{ route('post.publish', $post->id) }}" method="POST">

        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-sm btn-info">Publish</button>
    </form>

    @endcan

    @can('unpublish posts', Post::class)
    <form onsubmit="return confirm('Unpublish post ini?');" action="{{ route('post.unpublish', $post->id) }}" method="POST">

        @csrf
        @method('PUT')
        <button type="submit" class="btn btn-sm btn-info">Unpublish</button>
    </form>

    @endcan

</td>
