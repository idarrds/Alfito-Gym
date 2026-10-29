
@extends('layouts.Alfito')

@section('title', 'Dashboard - RIVOLT Athletic Club')

@section('content')
    <div class="eyebrow">MEMBER AREA</div>

    <h1>Dashboard</h1>

    <div class="card">
        <p class="muted">Selamat datang kembali,</p>

        <h2>{{ auth()->user()->name }}!</h2>

        <p class="muted">
            Kamu berhasil login ke RIVOLT Athletic Club.
        </p>

        @if(auth()->user()->role === 'admin')
            <div class="actions">
                <a href="{{ route('admin.applications.index') }}" class="btn">
                    Kelola Pengajuan
                </a>

                <a href="{{ route('admin.payments.index') }}" class="btn btn-secondary">
                    Kelola Pembayaran
                </a>
            </div>
        @else
            <div class="actions">
                <a href="{{ route('member.applications.index') }}" class="btn">
                    Membership Saya
                </a>
            </div>
        @endif
    </div>
@endsection
