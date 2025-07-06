<x-filament::page>
    <x-filament::section>
        <x-slot name="heading">
            Detail Surat
        </x-slot>

        <x-slot name="description">
            Informasi lengkap mengenai surat yang telah diarsipkan.
        </x-slot>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div><strong>Nomor Surat:</strong> {{ $record->mail_number }}</div>
            <div><strong>Perihal:</strong> {{ $record->subject }}</div>

            <div><strong>Jenis:</strong> {{ ucfirst($record->mail_type) }}</div>
            <div><strong>Kategori:</strong> {{ $record->category->category_name ?? '-' }}</div>

            <div><strong>Grup:</strong> {{ $record->group->category_name ?? '-' }}</div>
            <div><strong>Item:</strong> {{ $record->item->category_name ?? '-' }}</div>

            <div><strong>Pengirim:</strong> {{ $record->sender_name }}</div>
            <div><strong>Alamat Pengirim:</strong> {{ $record->sender_address }}</div>

            <div><strong>Penerima:</strong> {{ $record->receiver_name }}</div>
            <div><strong>Alamat Penerima:</strong> {{ $record->receiver_address }}</div>

            <div><strong>Tanggal Surat:</strong> {{ $record->mail_date }}</div>
            <div><strong>Diterima:</strong> {{ $record->received_date }}</div>

            <div><strong>Arsip:</strong> {{ $record->archived_date }}</div>
            <div><strong>Keamanan:</strong> {{ ucfirst($record->confidentiality_level) }}</div>

            <div><strong>Status:</strong> {{ ucfirst($record->mail_status) }}</div>

            @if ($record->file_path)
                <div class="col-span-2">
                    <strong>File:</strong>
                    <a href="{{ Storage::url($record->file_path) }}"
                       class="text-blue-600 hover:underline"
                       target="_blank">
                        Unduh File Surat
                    </a>
                </div>
            @endif
        </div>
    </x-filament::section>
</x-filament::page>
