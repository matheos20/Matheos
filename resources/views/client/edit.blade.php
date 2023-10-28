@include('header')
@section("title", "Créer un client")
    <style>
        input, select {
            border: 1px solid !important;
            border-radius: 15px !important;
            padding: 10px 10px !important;
        }
    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 mt-4 mb-5">
                
                <form id="clientForm" action="{{ route('client.update', $client) }}" method="POST">
                    @csrf
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nom</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control-plaintext" id="name" name="name" 
                                value="{{ isset($client->name) ? $client->name : old('name') }}">
                            @error("name")
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="statut" class="col-sm-2 col-form-label">Statut</label>
                        <div class="col-sm-10">
                            <select id="statut" class="form-control" name="statut">
                                <option value="" selected>----------------</option>
                                <option value="VIP" {{ $client->statut == 'VIP' ? 'selected' : '' }}>VIP</option>
                                <option value="Privilégié" {{ $client->statut == 'Privilégié' ? 'selected' : '' }}>Privilégié</option>
                                <option value="Standard" {{ $client->statut == 'Standard' ? 'selected' : '' }}>Standard</option>
                            </select>
                            @error("statut")
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="mb-3 row">
                        <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="contact" name="contact" 
                                value="{{ isset($client->contact) ? $client->contact : old('contact') }}">
                        </div>
                        @error("contact")
                            <div>{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="whatsapp" class="col-sm-2 col-form-label">Whatsapp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" 
                                value="{{ isset($client->whatsapp) ? $client->whatsapp : old('whatsapp') }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email Adresse</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="email" name="email" 
                            value="{{ isset($client->email) ? $client->email : old('email') }}">
                            @error("email")
                                <div style="color:red;">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-10"></div>
                        <div class="col-2">
                            <input type="submit" class="btn btn-primary" name="valider" value="Modifier" >
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>

@include('footer')
