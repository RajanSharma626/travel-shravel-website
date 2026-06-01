@extends('layouts.app')

@section('title', 'Visa Services | Travel Shravel')

@push('styles')
    <style>
        /* Forced layout spacing bypass rules */
        .hero-section {
            height: 480px !important;
        }
        .hero-content-shift {
            margin-top: -3.5rem !important;
        }
        .inquiry-section {
            margin-top: -3.5rem !important;
        }

        /* Accordion transition styles */
        .visa-accordion-card {
            border-radius: 16px !important;
            overflow: hidden;
            border: 1px solid #E5E7EB !important;
        }
        .accordion-btn {
            padding: 1.125rem 1.5rem !important;
            background-color: rgba(249, 250, 251, 0.5) !important;
        }
        .accordion-btn:hover {
            background-color: rgba(249, 250, 251, 1) !important;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0, 1, 0, 1);
        }
        .accordion-content.open {
            max-height: 2000px;
            transition: max-height 0.4s ease-in-out;
        }
        .accordion-btn i {
            transition: transform 0.3s ease;
        }
        .accordion-btn.active i {
            transform: rotate(180deg);
        }

        /* Form Accordion styles matching screenshot */
        .form-accordion-list {
            background: transparent;
        }
        .form-accordion-item {
            border-bottom: 1px solid #E5E7EB;
        }
        .form-accordion-btn {
            width: 100%;
            padding: 1.25rem 0.5rem !important;
            background: none !important;
            border: none;
            text-align: left;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 15px;
            font-weight: 600;
            color: #1E3A8A; /* deep navy */
            cursor: pointer;
            outline: none;
        }
        .form-accordion-btn i {
            transition: transform 0.2s ease;
            font-size: 12px;
            color: #1E3A8A;
        }
        .form-accordion-btn.active i {
            transform: rotate(90deg); /* Points down when rotated 90deg from pointing right */
        }
        .form-accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            padding-left: 1.5rem;
        }
        .form-accordion-content.open {
            max-height: 80px;
            padding-bottom: 1.25rem;
        }
    </style>
@endpush

@section('content')
    {{-- Hero Section --}}
    <section class="hero-section relative w-full overflow-hidden flex items-center justify-center bg-navy">
        {{-- Background Image --}}
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1614730321146-b6fa6a46bcb4?auto=format&fit=crop&q=80&w=1920" alt="Visa World Map Hero"
                class="h-full w-full object-cover">
            {{-- Shadow / Gradient Overlay --}}
            <div class="absolute inset-0 bg-black/55 bg-gradient-to-t from-black/85 via-black/45 to-black/75"></div>
        </div>

        {{-- Hero Content --}}
        <div class="hero-content-shift relative w-full max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-saffron/20 border border-saffron/30 text-white text-xs font-semibold tracking-wider uppercase mb-4 animate-pulse">
                <i class="fa-solid fa-passport text-[10px]"></i> Global Visa Assistance
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl text-white font-libre-baskerville mb-4 drop-shadow-lg uppercase tracking-wide">
                Visa Services
            </h1>
            <p class="text-base md:text-lg text-white/90 max-w-2xl mx-auto tracking-wide drop-shadow-sm font-light">
                Hassle-free tourist visa guidelines, documents checklist, and official visa application forms for Indian nationals traveling abroad.
            </p>
        </div>
    </section>

    {{-- Main Content Section --}}
    <section class="inquiry-section relative z-20 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto mb-20">
        <div class="bg-white rounded-3xl p-6 md:p-10 shadow-[0_20px_50px_rgba(0,0,0,0.08)] border border-gray-100">
            <div class="max-w-4xl mb-12">
                <h2 class="text-2xl md:text-3xl font-bold text-navy mb-4 tracking-tight">Documents Required to apply Tourist Visa for Indian Nationals</h2>
                <div class="w-12 h-1 bg-saffron mb-6 rounded-full"></div>
                <p class="text-gray-500 text-sm leading-relaxed font-light">
                    A Tourist Visa is granted to a traveler whose sole objective of visiting foreign country is recreation, sightseeing, casual visit to meet friends or relatives. Visa is non-extendable and non-convertible. Some Countries provide visa on arrival to Indian Nationals and for some countries you need to apply visa well in advance before you start your journey. Travel Shravel provides visa assistance to citizens of India who wish to travel abroad for tourism purpose. Dubai visa, Singapore Visa, Australia Visa, Malaysia Visa, Schengen Visa are among the countries for which Travel Shravel provides assistance. Take a guide before you apply for Dubai visa, Singapore Visa, Australia Visa, Malaysia Visa, Schengen Visa and for other countries in order to reduce the chances of rejection.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
                {{-- Left Column: Country documents --}}
                <div class="lg:col-span-2 space-y-4">
                    <h3 class="text-sm font-bold text-navy uppercase tracking-wider mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-saffron"></i> Document Checklist By Country
                    </h3>

                    @php
                        $countries = [
                            [
                                'id' => 'australia', 'name' => 'Australia Visa',
                                'open' => true,
                                'docs' => [
                                    'must' => [
                                        'Original passport with min 6 Months validity required from return date.',
                                        'Four photographs (35X45mm, matt finish, white background).',
                                        'Old passport (if have).',
                                        'Six months saving bank statement with bank stamp.',
                                        'Three years ITR.',
                                        'Any Fixed Deposit / PPF / Credit Card Statements.',
                                        'Cover letter (if business give on letter head).',
                                        'Air ticket.',
                                        'Travel insurance.',
                                        'Hotel booking.'
                                    ],
                                    'business' => [
                                        'Six months company bank statement with bank stamp.',
                                        'Three year company ITR (If Partnership / Private Ltd Company).',
                                        'GST certificate.',
                                        'Partnership deed copy (If Partnership Firm).',
                                        'Memorandum copy (If Private Ltd Company).'
                                    ],
                                    'salaried' => [
                                        'NOC from company.',
                                        'Three months salary slip.',
                                        'Offer letter.',
                                        'Employee ID card copy.'
                                    ],
                                    'student' => [
                                        'Student ID card.',
                                        'NOC from school / holiday list copy.'
                                    ],
                                    'sponsor' => [
                                        'Sponsorship letter.',
                                        'Sponsor ID card copy.',
                                        'Six months saving bank statement with bank stamp.',
                                        'Three years ITR with computation of income.',
                                        'Three months salary slip (If Salaried).',
                                        'Six months Company bank statement with Bank Stamp.',
                                        'Three year company ITR (If Partnership / Private Ltd Company).',
                                        'GST certificate.',
                                        'Partnership deed copy (If Partnership Firm).',
                                        'Memorandum copy (If Private Ltd Company).'
                                    ],
                                    'professional' => [
                                        'Bar council copy (If lawyer).',
                                        'Medical council copy (If doctor).',
                                        'CA certificate (If CA).'
                                    ]
                                ]
                            ],
                            ['id' => 'canada', 'name' => 'Canada Visa'],
                            ['id' => 'dubai', 'name' => 'Dubai Visa'],
                            ['id' => 'hongkong', 'name' => 'Hong Kong Visa'],
                            ['id' => 'indonesia', 'name' => 'Indonesia Visa'],
                            ['id' => 'malaysia', 'name' => 'Malaysia Visa'],
                            ['id' => 'schengen', 'name' => 'Schengen Visa'],
                            ['id' => 'singapore', 'name' => 'Singapore Visa'],
                            ['id' => 'srilanka', 'name' => 'Sri Lanka Visa'],
                            ['id' => 'thailand', 'name' => 'Thailand Visa'],
                            ['id' => 'uk', 'name' => 'UK Visa'],
                            ['id' => 'usa', 'name' => 'USA Visa']
                        ];
                    @endphp

                    @foreach($countries as $c)
                        <div class="visa-accordion-card bg-white shadow-sm">
                            <button type="button" onclick="toggleAccordion('{{ $c['id'] }}')" id="btn-{{ $c['id'] }}"
                                class="accordion-btn w-full flex items-center justify-between text-left border-none outline-none cursor-pointer {{ isset($c['open']) && $c['open'] ? 'active' : '' }}">
                                <span class="text-sm font-bold text-navy flex items-center gap-2.5">
                                    <i class="fa-solid fa-passport text-gray-400"></i> {{ $c['name'] }}
                                </span>
                                <i class="fa-solid fa-chevron-down text-xs text-gray-400"></i>
                            </button>
                            
                            <div id="content-{{ $c['id'] }}" class="accordion-content {{ isset($c['open']) && $c['open'] ? 'open' : '' }}">
                                <div class="p-6 border-t border-gray-150 space-y-6 text-sm text-gray-600 font-light">
                                    @if(isset($c['docs']))
                                        {{-- Must Documents --}}
                                        <div>
                                            <h4 class="font-bold text-navy mb-3 text-[13px] uppercase tracking-wide">Must required documents from applicant for {{ $c['name'] }} are:</h4>
                                            <ul class="space-y-2 pl-5 list-disc">
                                                @foreach($c['docs']['must'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        <h4 class="font-bold text-navy mt-6 mb-3 text-[13px] uppercase tracking-wide">Other documents required from applicant</h4>
                                        
                                        {{-- Business --}}
                                        <div class="pl-4 border-l-2 border-saffron space-y-2">
                                            <h5 class="font-semibold text-navy text-xs italic">If Business</h5>
                                            <ul class="space-y-1.5 pl-5 list-disc text-xs">
                                                @foreach($c['docs']['business'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        {{-- Salaried --}}
                                        <div class="pl-4 border-l-2 border-india-green space-y-2">
                                            <h5 class="font-semibold text-navy text-xs italic">If Salaried</h5>
                                            <ul class="space-y-1.5 pl-5 list-disc text-xs">
                                                @foreach($c['docs']['salaried'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        {{-- Student --}}
                                        <div class="pl-4 border-l-2 border-saffron space-y-2">
                                            <h5 class="font-semibold text-navy text-xs italic">If Student</h5>
                                            <ul class="space-y-1.5 pl-5 list-disc text-xs">
                                                @foreach($c['docs']['student'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        {{-- Sponsor Case --}}
                                        <div class="pl-4 border-l-2 border-india-green space-y-2">
                                            <h5 class="font-semibold text-navy text-xs italic">If Sponsor Case</h5>
                                            <ul class="space-y-1.5 pl-5 list-disc text-xs">
                                                @foreach($c['docs']['sponsor'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>

                                        {{-- Professional --}}
                                        <div class="pl-4 border-l-2 border-saffron space-y-2">
                                            <h5 class="font-semibold text-navy text-xs italic">If Professional</h5>
                                            <ul class="space-y-1.5 pl-5 list-disc text-xs">
                                                @foreach($c['docs']['professional'] as $d)
                                                    <li>{{ $d }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                        <div class="text-center py-6">
                                            <i class="fa-solid fa-circle-info text-2xl text-gray-300 mb-3 block"></i>
                                            <p class="text-xs text-gray-400">Detailed guidelines for {{ $c['name'] }} are being loaded. Contact our customer care for immediate assistance.</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Right Column: Visa forms links --}}
                <div class="space-y-4">
                    <h3 class="text-sm font-bold text-navy uppercase tracking-wider mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf text-saffron"></i> Visa Form Downloads
                    </h3>

                    @php
                        $forms = [
                            ['id' => 'aus-form', 'name' => 'Australia Visa Form', 'hasLink' => true, 'open' => true],
                            ['id' => 'can-form', 'name' => 'Canada Visa Form', 'hasLink' => true],
                            ['id' => 'dub-form', 'name' => 'Dubai Visa Form', 'hasLink' => true],
                            ['id' => 'hk-form', 'name' => 'Hong Kong Visa Form', 'hasLink' => true],
                            ['id' => 'indo-form', 'name' => 'Indonesia Visa Form'],
                            ['id' => 'malay-form', 'name' => 'Malaysia Visa Form'],
                            ['id' => 'schen-form', 'name' => 'Schengen Visa Form'],
                            ['id' => 'sing-form', 'name' => 'Singapore Visa Form'],
                            ['id' => 'sl-form', 'name' => 'Sri Lanka Visa Form'],
                            ['id' => 'thai-form', 'name' => 'Thailand Visa Form'],
                            ['id' => 'uk-form', 'name' => 'UK Visa Form'],
                            ['id' => 'usa-form', 'name' => 'USA Visa Form']
                        ];
                    @endphp

                    <div class="form-accordion-list">
                        @foreach($forms as $f)
                            <div class="form-accordion-item">
                                <button type="button" onclick="toggleFormAccordion('{{ $f['id'] }}')" id="btn-{{ $f['id'] }}"
                                    class="form-accordion-btn {{ isset($f['open']) && $f['open'] ? 'active' : '' }}">
                                    <i class="fa-solid fa-caret-right"></i>
                                    <span>{{ $f['name'] }}</span>
                                </button>
                                <div id="content-{{ $f['id'] }}" class="form-accordion-content {{ isset($f['open']) && $f['open'] ? 'open' : '' }}">
                                    @if(isset($f['hasLink']))
                                        <div class="text-sm">
                                            <a href="#" class="text-saffron hover:underline font-semibold">Click here</a>
                                            <span class="text-gray-500 font-light ml-0.5">for {{ $f['name'] }}</span>
                                        </div>
                                    @else
                                        <span class="text-xs text-gray-400 font-light">
                                            Form loading... Call assistance
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            function toggleAccordion(id) {
                const content = document.getElementById('content-' + id);
                const btn = document.getElementById('btn-' + id);
                
                if (content && btn) {
                    const isOpen = content.classList.contains('open');
                    
                    // Close all other accordions
                    document.querySelectorAll('.accordion-content').forEach(c => {
                        c.classList.remove('open');
                        c.style.maxHeight = '0px';
                    });
                    document.querySelectorAll('.accordion-btn').forEach(b => {
                        b.classList.remove('active');
                    });
                    
                    // If it was closed, open it now
                    if (!isOpen) {
                        content.classList.add('open');
                        content.style.maxHeight = '2000px';
                        btn.classList.add('active');
                    } else {
                        content.classList.remove('open');
                        content.style.maxHeight = '0px';
                        btn.classList.remove('active');
                    }
                }
            }

            function toggleFormAccordion(id) {
                const content = document.getElementById('content-' + id);
                const btn = document.getElementById('btn-' + id);
                
                if (content && btn) {
                    const isOpen = content.classList.contains('open');
                    
                    // Close all other form accordions
                    document.querySelectorAll('.form-accordion-content').forEach(c => {
                        c.classList.remove('open');
                        c.style.maxHeight = '0px';
                        c.style.paddingBottom = '0px';
                    });
                    document.querySelectorAll('.form-accordion-btn').forEach(b => {
                        b.classList.remove('active');
                    });
                    
                    // If it was closed, open it now
                    if (!isOpen) {
                        content.classList.add('open');
                        content.style.maxHeight = '80px';
                        content.style.paddingBottom = '1.25rem';
                        btn.classList.add('active');
                    } else {
                        content.classList.remove('open');
                        content.style.maxHeight = '0px';
                        content.style.paddingBottom = '0px';
                        btn.classList.remove('active');
                    }
                }
            }

            // Set initial state for open accordion
            document.addEventListener('DOMContentLoaded', () => {
                const openContent = document.querySelector('.accordion-content.open');
                if (openContent) {
                    openContent.style.maxHeight = '2000px';
                }

                const openFormContent = document.querySelector('.form-accordion-content.open');
                if (openFormContent) {
                    openFormContent.style.maxHeight = '80px';
                    openFormContent.style.paddingBottom = '1.25rem';
                }
            });
        </script>
    @endpush
@endsection
