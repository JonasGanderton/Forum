<p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
    Posted by<i>
        <a href="{{ route('users.show', ['username' => $post->userAccount->username]) }}" class="hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
        {{ $post->userAccount->username }}
        </a>
    </i><br><i>{{ $post->posted_at}}</i>
</p>