@extends('layouts.alfito')

@section('title', 'Membership | RIVOLT')

@section('content')
    <p class="eyebrow">EARN YOUR STRENGTH</p>
    <h1>Pilih membership kamu.</h1>
    <p class="muted">
        Pilih paket latihan yang sesuai dengan targetmu.
    </p>

    <h2>Paket Membership</h2>

    <div class="grid">
        @forelse($plans as $plan)
            <div class="card">
                <h3>{{ $plan->name }}</h3>

                <div class="price">
                    Rp {{ number_format((float) $plan->price, 0, ',', '.') }}
                </div>

                <p class="muted">
                    Durasi {{ $plan->duration_months }} bulan
                </p>

                <form
                    action="{{ route('member.applications.store') }}"
                    method="POST"
                >
                    @csrf

                    <input
                        type="hidden"
                        name="membership_plan_id"
                        value="{{ $plan->id }}"
                    >

                    <button class="btn" type="submit">
                        Ajukan Paket
                    </button>
                </form>
            </div>
        @empty
            <p>Belum ada paket membership aktif.</p>
        @endforelse
    </div>

    <h2 style="margin-top: 45px;">Pengajuan Saya</h2>

    @forelse($applications as $application)
        <div class="card">
            <h3>{{ $application->membershipPlan->name }}</h3>

            <p>
                Nomor pengajuan: #{{ $application->id }}
            </p>

            <p>
                Harga saat pengajuan:
                <strong>
                    Rp {{ number_format((float) $application->price_snapshot, 0, ',', '.') }}
                </strong>
            </p>

            <p>
                Status:
                <span class="status">{{ $application->status }}</span>
            </p>

            @if($application->membership)
                <p>
                    Status membership:
                    <span class="status">
                        {{ $application->membership->status }}
                    </span>
                </p>

                <p class="muted">
                    Berakhir:
                    {{ $application->membership->ends_at->format('d M Y') }}
                </p>
            @endif

            @if(
                $application->status === 'awaiting_payment' &&
                $application->payments->whereIn('status', ['pending', 'verified'])->isEmpty()
            )
                <hr>

                <h3>Unggah Bukti Pembayaran</h3>

                <form
                    action="{{ route('member.applications.payment.store', $application->id) }}"
                    method="POST"
                    enctype="multipart/form-data"
                >
                    @csrf

                    <label for="proof-{{ $application->id }}">
                        Bukti transfer (JPG, PNG, atau PDF; maks. 5 MB)
                    </label>

                    <input
                        id="proof-{{ $application->id }}"
                        type="file"
                        name="proof"
                        accept=".jpg,.jpeg,.png,.pdf"
                        required
                    >

                    <label for="reference-{{ $application->id }}">
                        Nomor referensi (opsional)
                    </label>

                    <input
                        id="reference-{{ $application->id }}"
                        type="text"
                        name="reference_number"
                        maxlength="100"
                    >

                    <button class="btn" type="submit">
                        Kirim Pembayaran
                    </button>
                </form>
            @endif

            @if($application->payments->isNotEmpty())
                <h4>Riwayat Pembayaran</h4>

                @foreach($application->payments as $payment)
                    <p>
                        Rp {{ number_format((float) $payment->amount, 0, ',', '.') }}
                        —
                        <span class="status">{{ $payment->status }}</span>
                    </p>
                @endforeach
            @endif
        </div>
    @empty
        <p class="muted">Kamu belum memiliki pengajuan membership.</p>
    @endforelse
@endsection