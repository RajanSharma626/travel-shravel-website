@extends('layouts.app')

@section('title', 'Frequently Asked Questions - Travel Shravel')

@section('content')
    {{-- Hero Section --}}
    <div class="relative bg-navy py-20 overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&w=1920&q=80"
                alt="FAQ BG" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-b from-navy/60 to-navy/90"></div>
        </div>
        <div class="relative z-10 mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-extrabold text-white mb-6">Frequently Asked Questions</h1>
            <nav class="flex justify-center" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li><a href="{{ url('/') }}" class="text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a></li>
                    <li><div class="flex items-center"><i class="fa-solid fa-chevron-right text-gray-400 text-[10px] mx-2"></i><span class="text-saffron text-sm font-semibold">FAQs</span></div></li>
                </ol>
            </nav>
        </div>
    </div>

    {{-- FAQ Section --}}
    <section class="py-24 bg-gray-50">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-navy mb-4">How can we help you?</h2>
                <p class="text-gray-500 max-w-2xl mx-auto">Find answers to the most common questions about our travel services, bookings, and policies. If you can't find what you're looking for, feel free to contact us.</p>
            </div>

            <div class="space-y-4">
                @php
                    $faqs = [
                        [
                            'q' => 'How do I book a tour with Travel Shravel?',
                            'a' => 'You can book your dream vacation directly through our website, by calling our 24/7 helpline at +91 90 86 421601, or by visiting our office in Jammu. Simply select your destination, choose your preferred dates, and follow our secure booking process.'
                        ],
                        [
                            'q' => 'What payment methods do you accept?',
                            'a' => 'We accept all major credit and debit cards (Visa, Mastercard, Amex), UPI (Google Pay, PhonePe), Net Banking from all Indian banks, and direct bank transfers. For offline bookings at our office, we also accept cash and cheques.'
                        ],
                        [
                            'q' => 'Can I cancel or modify my booking after it\'s confirmed?',
                            'a' => 'Yes, modifications and cancellations are possible. However, refund amounts and rescheduling fees depend on the specific package and how close you are to the departure date. Please refer to our detailed cancellation policy provided during booking or contact your travel consultant.'
                        ],
                        [
                            'q' => 'Is travel insurance included in my package?',
                            'a' => 'While some premium packages include basic travel insurance, it is generally offered as an optional add-on. We strongly recommend all our travelers to opt for comprehensive travel insurance to cover medical emergencies, trip delays, and luggage loss.'
                        ],
                        [
                            'q' => 'Do you provide assistance with international visas?',
                            'a' => 'Absolutely! We provide end-to-end visa assistance for all international destinations, including document verification, appointment scheduling, and guidance for embassy interviews. Please note that visa issuance is ultimately at the discretion of the respective embassy.'
                        ],
                        [
                            'q' => 'What should I do if my flight is delayed or cancelled during the trip?',
                            'a' => 'In case of any disruptions, our 24/7 dedicated support team is available to assist you. We will coordinate with the airline and update your hotel/transport transfers to match the revised schedule, ensuring a seamless experience despite the changes.'
                        ],
                        [
                            'q' => 'Are your tour packages customizable?',
                            'a' => 'Yes, we specialize in tailor-made itineraries! If you have specific interests or requirements, our travel experts can customize any package to match your preferences, budget, and travel style. Just click on "Enquire Now" or contact us with your details.'
                        ]
                    ];
                @endphp

                @foreach ($faqs as $index => $faq)
                    <div class="bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 transition-all hover:shadow-md">
                        <button 
                            onclick="toggleFaq({{ $index }})" 
                            class="w-full flex items-center justify-between p-6 md:p-8 text-left outline-none group"
                        >
                            <span class="text-lg font-bold text-navy group-hover:text-india-green transition-colors">{{ $faq['q'] }}</span>
                            <div id="icon-{{ $index }}" class="w-10 h-10 rounded-2xl bg-gray-50 flex items-center justify-center transition-all duration-300">
                                <i class="fa-solid fa-plus text-gray-400 transition-colors"></i>
                            </div>
                        </button>
                        <div id="faq-{{ $index }}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                            <div class="px-6 pb-8 md:px-8 md:pb-10">
                                <div class="p-6 bg-gray-50 rounded-2xl border-l-4 border-india-green">
                                    <p class="text-gray-600 leading-relaxed">{{ $faq['a'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="py-20 bg-white">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 text-center bg-navy rounded-[50px] p-12 md:p-20 relative overflow-hidden shadow-2xl">
            <div class="absolute top-0 right-0 w-64 h-64 bg-saffron/10 rounded-full -mr-32 -mt-32"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-india-green/10 rounded-full -ml-24 -mb-24"></div>
            <div class="relative z-10">
                <h3 class="text-3xl font-bold text-white mb-6">Still have questions?</h3>
                <p class="text-gray-300 mb-10 text-lg">Our friendly team is here to help you plan your perfect adventure.</p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ url('/contact') }}" class="px-10 py-4 bg-saffron text-navy font-bold rounded-2xl hover:bg-white hover:scale-105 transition-all shadow-lg active:scale-95">
                        Contact Support
                    </a>
                    <a href="tel:+919086421601" class="px-10 py-4 bg-white/10 text-white font-bold rounded-2xl hover:bg-white/20 transition-all border border-white/20">
                        Call +91 9086 421 601
                    </a>
                </div>
            </div>
        </div>
    </section>

    <script>
        function toggleFaq(index) {
            const faq = document.getElementById(`faq-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            const iconSpan = icon.querySelector('i');
            const allFaqs = document.querySelectorAll('[id^="faq-"]');
            const allIcons = document.querySelectorAll('[id^="icon-"]');

            allFaqs.forEach((item, i) => {
                if (i !== index) {
                    item.style.maxHeight = null;
                    allIcons[i].classList.remove('bg-india-green', 'rotate-180');
                    const s = allIcons[i].querySelector('i');
                    if (s) {
                        s.classList.replace('fa-minus', 'fa-plus');
                        s.classList.remove('text-white');
                        s.classList.add('text-gray-400');
                    }
                }
            });

            if (faq.style.maxHeight) {
                faq.style.maxHeight = null;
                icon.classList.remove('bg-india-green', 'rotate-180');
                iconSpan.classList.replace('fa-minus', 'fa-plus');
                iconSpan.classList.remove('text-white');
                iconSpan.classList.add('text-gray-400');
            } else {
                faq.style.maxHeight = faq.scrollHeight + "px";
                icon.classList.add('bg-india-green', 'rotate-180');
                iconSpan.classList.replace('fa-plus', 'fa-minus');
                iconSpan.classList.remove('text-gray-400');
                iconSpan.classList.add('text-white');
            }
        }
    </script>
@endsection
