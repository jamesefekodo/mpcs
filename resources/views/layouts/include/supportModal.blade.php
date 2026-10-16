@if (Auth::user() && in_array(Auth::user()->account_type, [1, 2]))
@else
    <div class="whatsapp-chat">
        <div class="whatsapp-chat-button" onclick="openWhatsApp()">
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp">
        </div>
    </div>

     {{-- const phoneNumber = "{{ whatsappSupportNumber() }}"; --}}
    <script>
        function openWhatsApp() {
            const phoneNumber = "2349155088777";
            const preFilledMessage = "{{ config('app.name') }}" + ":: Support";

            // Generate the  WhatsApp URL
            const whatsappUrl =
                `https://wa.me/${phoneNumber.replace(/[^0-9]/g, '')}?text=${encodeURIComponent(preFilledMessage)}`;

            // Open WhatsApp chat in a new tab
            window.open(whatsappUrl, '_blank');
        }
    </script>
@endif
