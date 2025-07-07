<x-filament::page>
    <x-filament::section>
        <x-slot name="heading">Detail Surat</x-slot>
        <x-slot name="description">
            Informasi lengkap mengenai surat yang telah diarsipkan.
        </x-slot>

        {{-- Informasi Umum --}}
        <div class="mb-4">
            <x-filament::section>
                <x-slot name="heading">Informasi Umum</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><strong>Nomor Surat:</strong> {{ $record->mail_number }}</div>
                    <div><strong>Perihal:</strong> {{ $record->subject }}</div>
                    <div><strong>Jenis:</strong> {{ ucfirst($record->mail_type) }}</div>
                    <div><strong>Status:</strong> {{ ucfirst($record->mail_status) }}</div>
                    <div><strong>Keamanan:</strong> {{ ucfirst($record->confidentiality_level) }}</div>
                </div>
            </x-filament::section>
        </div>

        {{-- Kategori Surat --}}
        <div class="mb-4">
            <x-filament::section>
                <x-slot name="heading">Kategori Surat</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><strong>Kategori:</strong> {{ $record->category->category_name ?? '-' }}</div>
                    <div><strong>Grup:</strong> {{ $record->group->category_name ?? '-' }}</div>
                    <div><strong>Item:</strong> {{ $record->item->category_name ?? '-' }}</div>
                </div>
            </x-filament::section>
        </div>

        {{-- Pengirim & Penerima --}}
        <div class="mb-4">
            <x-filament::section>
                <x-slot name="heading">Pengirim & Penerima</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div><strong>Pengirim:</strong> {{ $record->sender_name }}</div>
                    <div><strong>Alamat Pengirim:</strong> {{ $record->sender_address }}</div>
                    <div><strong>Penerima:</strong> {{ $record->receiver_name }}</div>
                    <div><strong>Alamat Penerima:</strong> {{ $record->receiver_address }}</div>
                </div>
            </x-filament::section>
        </div>

        {{-- Tanggal --}}
        <div class="mb-4">
            <x-filament::section>
                <x-slot name="heading">Tanggal</x-slot>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div><strong>Tanggal Surat:</strong> {{ \Carbon\Carbon::parse($record->mail_date)->format('d M Y') }}</div>
                    <div><strong>Tanggal Diterima:</strong> {{ \Carbon\Carbon::parse($record->received_date)->format('d M Y') }}</div>
                    <div><strong>Tanggal Arsip:</strong> {{ \Carbon\Carbon::parse($record->archived_date)->format('d M Y') }}</div>
                </div>
            </x-filament::section>
        </div>

        {{-- File Surat --}}
        @if ($record->file_path)
            <div class="mb-4">
                <x-filament::section>
                    <x-slot name="heading">Lampiran</x-slot>
                    <div>
                        <strong>File:</strong>
                        <a href="{{ Storage::url($record->file_path) }}"
                           class="text-blue-600 hover:underline"
                           target="_blank">
                            Unduh File Surat
                        </a>
                    </div>
                </x-filament::section>
            </div>
        @endif

    </x-filament::section>
</x-filament::page>
