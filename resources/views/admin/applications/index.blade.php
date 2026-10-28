@extends('layouts.alfito')

@section('title', 'Review Pengajuan | RIVOLT')

@section('content')
    <p class="eyebrow">ADMINISTRATION</p>
    <h1>Membership Applications</h1>
    <p class="muted">
        Tinjau pengajuan sebelum member melakukan pembayaran.
    </p>

    @forelse($applications as $application)
        <div class="card">
            <h3>
                #{{ $application->id }} —
                {{ $application->user->name }}
            </h3>

            <p>
                Email: {{ $application->user->email }}
            </p>

            <p>
                Paket: {{ $application->membershipPlan->name }}
            </p>

            <p>
                Harga:
                Rp {{ number_format((float) $application->price_snapshot, 0, ',', '.') }}
            </p>

            <p>
                Status:
                <span class="status">{{ $application->status }}</span>
            </p>

            @if($application->admin_notes)
                <p>Catatan: {{ $application->admin_notes }}</p>
            @endif

            @if($application->status === 'pending')
                <form
                    action="{{ route('admin.applications.review', $application->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <label for="decision-{{ $application->id }}">
                        Keputusan
                    </label>

                    <select
                        id="decision-{{ $application->id }}"
                        name="decision"
                        required
                    >
                        <option value="approve">Setujui pengajuan</option>
                        <option value="reject">Tolak pengajuan</option>
                    </select>

                    <label for="notes-{{ $application->id }}">
                        Catatan admin (opsional)
                    </label>

                    <textarea
                        id="notes-{{ $application->id }}"
                        name="notes"
                        maxlength="1000"
                        rows="3"
                    ></textarea>

                    <button class="btn" type="submit">
                        Proses Pengajuan
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p>Belum ada pengajuan membership.</p>
    @endforelse
@endsection