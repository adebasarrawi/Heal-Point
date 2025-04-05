@extends('layouts.public.doctorPortal')

@section('styles')
<style>
    .subscription-container {
        max-width: 1000px;
        margin: 2rem auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
        border-top: 4px solid #e12454;
        overflow: hidden;
    }
    .subscription-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }
    .subscription-plans {
        padding: 2.5rem;
        background-color: #f8fafc;
    }
    .subscription-form {
        padding: 2.5rem;
    }
    .subscription-header {
        margin-bottom: 2rem;
    }
    .subscription-icon {
        width: 60px;
        height: 60px;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: rgba(225, 36, 84, 0.1);
        border-radius: 50%;
    }
    .subscription-icon svg {
        width: 30px;
        height: 30px;
        color: #e12454;
    }
    .subscription-title {
        font-size: 1.5rem;
        color: #223a66;
        margin-bottom: 0.5rem;
        font-weight: 700;
    }
    .subscription-subtitle {
        color: #4a5568;
        font-size: 1rem;
    }
    .duration-options {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .duration-option {
        border: 1px solid #e2e8f0;
        border-radius: 8px;
        padding: 1.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        background: white;
    }
    .duration-option:hover {
        border-color: #e12454;
    }
    .duration-option.selected {
        border: 2px solid #e12454;
        background-color: rgba(225, 36, 84, 0.03);
    }
    .duration-label {
        font-weight: 600;
        color: #223a66;
        margin-bottom: 0.5rem;
        display: flex;
        justify-content: space-between;
    }
    .duration-price {
        font-size: 1.25rem;
        font-weight: 700;
        color: #e12454;
    }
    .monthly-rate {
        font-size: 0.875rem;
        color: #64748b;
    }
    .form-group {
        margin-bottom: 1.5rem;
    }
    .form-label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
        color: #223a66;
    }
    .form-input {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #e2e8f0;
        border-radius: 6px;
        transition: all 0.3s;
    }
    .form-input:focus {
        outline: none;
        border-color: #e12454;
        box-shadow: 0 0 0 3px rgba(225, 36, 84, 0.1);
    }
    .btn-subscribe {
        background-color: #e12454;
        color: white;
        padding: 0.75rem 1.5rem;
        border-radius: 6px;
        font-weight: 600;
        width: 100%;
        border: none;
        cursor: pointer;
        transition: background-color 0.3s;
        font-size: 1rem;
        margin-top: 1rem;
    }
    .btn-subscribe:hover {
        background-color: #c01e48;
    }
    .btn-subscribe:disabled {
        background-color: #cbd5e0;
        cursor: not-allowed;
    }
    .total-display {
        background-color: #f8fafc;
        padding: 1rem;
        border-radius: 6px;
        margin-top: 1.5rem;
        text-align: center;
    }
    .total-label {
        font-weight: 600;
        color: #64748b;
    }
    .total-amount {
        font-size: 1.5rem;
        font-weight: 700;
        color: #223a66;
    }
    @media (max-width: 768px) {
        .subscription-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="subscription-container">
        <div class="subscription-grid">
            <!-- Plans Section (Left) -->
            <div class="subscription-plans">
                <div class="subscription-header">
                    <div class="subscription-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                        </svg>
                    </div>
                    <h1 class="subscription-title">Choose Your Plan</h1>
                    <p class="subscription-subtitle">Select your preferred subscription duration</p>
                </div>

                <div class="duration-options">
                    <div class="duration-option" data-months="1" onclick="selectDuration(1, 20)">
                        <div class="duration-label">
                            <span>1 Month</span>
                            <span class="duration-price">20 JOD</span>
                        </div>
                        <div class="monthly-rate">20 JOD per month</div>
                    </div>

                    <div class="duration-option" data-months="3" onclick="selectDuration(3, 57)">
                        <div class="duration-label">
                            <span>3 Months</span>
                            <span class="duration-price">57 JOD</span>
                        </div>
                        <div class="monthly-rate">19 JOD per month (5% savings)</div>
                    </div>

                    <div class="duration-option" data-months="6" onclick="selectDuration(6, 108)">
                        <div class="duration-label">
                            <span>6 Months</span>
                            <span class="duration-price">108 JOD</span>
                        </div>
                        <div class="monthly-rate">18 JOD per month (10% savings)</div>
                    </div>

                    <div class="duration-option" data-months="12" onclick="selectDuration(12, 204)">
                        <div class="duration-label">
                            <span>1 Year</span>
                            <span class="duration-price">204 JOD</span>
                        </div>
                        <div class="monthly-rate">17 JOD per month (15% savings)</div>
                    </div>

                    <div class="duration-option" data-months="24" onclick="selectDuration(24, 384)">
                        <div class="duration-label">
                            <span>2 Years</span>
                            <span class="duration-price">384 JOD</span>
                        </div>
                        <div class="monthly-rate">16 JOD per month (20% savings)</div>
                    </div>
                </div>
            </div>

            <!-- Form Section (Right) -->
            <div class="subscription-form">
                <div class="subscription-header">
                    <h1 class="subscription-title">Payment Information</h1>
                    <p class="subscription-subtitle">Enter your details to complete subscription</p>
                </div>
                {{-- {{ route('doctor.subscription.process') }} --}}
                <form id="subscription-form" action="{{ route('doctor.subscription.process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                    <input type="hidden" name="duration_months" id="duration_months" value="">
                    <input type="hidden" name="amount" id="amount" value="">

                    <div class="form-group">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-input" name="full_name" placeholder="Your full name">
                    </div>

                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" class="form-input" name="email" value="{{ $doctor->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Card Number</label>
                        <input type="text" class="form-input" name="card_number" placeholder="1234 5678 9012 3456">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-group">
                            <label class="form-label">Expiry Date</label>
                            <input type="text" class="form-input" name="expiry_date" placeholder="MM/YY">
                        </div>
                        <div class="form-group">
                            <label class="form-label">CVV</label>
                            <input type="text" class="form-input" name="cvv" placeholder="123">
                        </div>
                    </div>

                    <div class="total-display" id="total-section" style="display: none;">
                        <div class="total-label">Total Amount</div>
                        <div class="total-amount" id="total-amount">0 JOD</div>
                    </div>

                    <button type="submit" class="btn-subscribe" id="submit-button" disabled>
                        Complete Subscription
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function selectDuration(months, amount) {
        // Update UI
        document.querySelectorAll('.duration-option').forEach(option => {
            option.classList.remove('selected');
        });
        event.currentTarget.classList.add('selected');

        // Update form fields
        document.getElementById('duration_months').value = months;
        document.getElementById('amount').value = amount;

        // Update total display
        document.getElementById('total-section').style.display = 'block';
        document.getElementById('total-amount').textContent = amount + ' JOD';

        // Enable submit button
        document.getElementById('submit-button').disabled = false;
    }
</script>
@endsection
