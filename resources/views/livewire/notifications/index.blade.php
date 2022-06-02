<div class="overflow-scroll border-b border-gray-200">
    @if (!$notifications->isEmpty())
    <table class="min-w-full">
        <thead class="bg-blue-500">
            <tr>
                <x-table.head class="whitespace-nowrap">Message</x-table.head>
                <x-table.head class="whitespace-nowrap">Date</x-table.head>
                <x-table.head class="text-center whitespace-nowrap">Action</x-table.head>
            </tr>
        </thead>

        <tbody class="divide-y divide-gray-200 divide-solid whitespace-nowrap">
            @foreach ($notifications as $notification)
            <tr>
                <x-table.data>
                    <div>
                        A new reply was add to
                        <a href="{{ route('replies.replyAble', [$notification->data['replyable_id'], $notification->data['replyable_type']]) }}" class="ml-2 font-bold text-blue-500">
                            {{-- {{ $notification->data['replyable_subject'] }} --}}
                            {{ dd($notification) }}
                        </a>
                    </div>
                </x-table.data>

                <x-table.data>
                    <div>{{ $notification->created_at->diffForHumans() }}</div>
                </x-table.data>

                <x-table.data class="text-center">
                    <x-jet-button wire:click="markAsRead('{{ $notification->id }}')">
                        {{ __('Mark As Read') }}
                    </x-jet-button>
                </x-table.data>
                @endforeach
            </tr>
        </tbody>
    </table>
    @else
    You have no unread Notifications
    @endif

</div>
