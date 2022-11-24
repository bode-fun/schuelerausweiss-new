<x-guest-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden">
                <div class="p-6">

                    @if ($valid)
                        <div class="shadowed-card">
                            <div class="success-icon"></div><br>
                            <b>{{ $firstName }} {{ $sirName }}</b> <br> ist nur mit Personalausweis gültig<br>
                        </div>
                    @else
                        <div class="shadowed-card">
                            <div class="error-icon"></div><br>
                            <b>
                                {{ $resp }}
                            </b><br>
                        </div>
                    @endif



                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
