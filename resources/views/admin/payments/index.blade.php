@extends('layouts.alfito')

@section('title', 'Verifikasi Pembayaran | RIVOLT')

@section('content')
    <p class="eyebrow">ADMINISTRATION</p>
    <h1>Payment Verification</h1>
    <p class="muted">
        Periksa bukti pembayaran sebelum mengaktifkan membership.
    </p>

    @forelse($payments as $payment)
        <div class="card">
            <h3>
                Pembayaran #{{ $payment->id }}
            </h3>

            <p>
                Member: {{ $payment->application->user->name }}
            </p>

            <p>
                Paket: {{ $payment->application->membershipPlan->name }}
            </p>

            <p>
                Jumlah:
                Rp {{ number_format((float) $payment->amount, 0, ',', '.') }}
            </p>

            <p>
                Referensi:
                {{ $payment->reference_number ?: '-' }}
            </p>

            <p>
                Status:
                <span class="status">{{ $payment->status }}</span>
            </p>

            @if($payment->proof_path)
                <p>
                    <a
                        href="{{ route('admin.payments.proof', $payment->id) }}"
                        target="_blank"
                        rel="noopener"
                    >
                        Buka bukti pembayaran
                    </a>
                </p>
            @endif

            @if($payment->status === 'pending')
                <form
                    action="{{ route('admin.payments.decision', $payment->id) }}"
                    method="POST"
                >
                    @csrf
                    @method('PATCH')

                    <label for="decision-{{ $payment->id }}">
                        Keputusan pembayaran
                    </label>

                    <select
                        id="decision-{{ $payment->id }}"
                        name="decision"
                        required
                    >
                        <option value="approve">Verifikasi pembayaran</option>
                        <option value="reject">Tolak pembayaran</option>
                    </select>

                    <label for="notes-{{ $payment->id }}">
                        Catatan (opsional)
                    </label>

                    <textarea
                        id="notes-{{ $payment->id }}"
                        name="notes"
                        maxlength="1000"
                        rows="3"
                    ></textarea>

                    <button class="btn" type="submit">
                        Proses Pembayaran
                    </button>
                </form>
            @endif
        </div>
    @empty
        <p>Belum ada pembayaran yang tercatat.</p>
    @endforelse
@endsection