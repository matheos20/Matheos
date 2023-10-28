@include('header')
@section("title", "Test laravel Matheos")
<style>
    input, select {
        border: 1px solid !important;
        border-radius: 15px !important;
        padding: 10px 30px !important;
    }
</style>
        <!-- Portfolio Section-->
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Listes des clients</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                <div class="container mt-5 px-2">
    
        <div class="position-relative mb-4 mt-4">
           
            <form action="{{ route('client.index') }}" method="GET">
                <div class="row">
                    <div class="col-2">
                        <span class="position-absolute search"><i class="fa fa-search"></i></span>
                        <input class="form-control w-100" name="search" placeholder="Recherche" value="{{ $search }}">
                    </div>
                    
                    <div class="col-8">
                       
                        <input type="submit" class="btn btn-primary" value="Rechercher" >
                        @if ($search)
                            <form action="{{ route('client.index') }}" method="GET">
                                <input type="hidden" name="search">
                                <input type="hidden" name="statut">
                                <input type="submit" class="btn btn-danger" value="Reset" >
                                
                            </form> 
                            @endif
                    </div>
                    <div class="col-2">
                        @if (Auth::user()->hasRole('ADMIN'))
                            <a href="{{ route('client.create') }}" class="btn btn-primary">Ajout client <i class="fa fa-plus"></i></a>
                        @endif
                        </div>
                </div>     
            </form> 

        </div>
    
    <div class="table-responsive">
        <table class="table table-responsive table-borderless">
            
            <thead>
                <tr class="bg-light">
                <th scope="col" width="20%">Nom</th>
                <th scope="col" width="10%">Status</th>
                <th scope="col" width="20%">Contact</th>
                <th scope="col" width="20%">Whatsapp</th>
                <th scope="col" width="20%">Email Adresse</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                    <td>{{ $client->name }}</td>
                    <td>{{ $client->statut }}</td>
                    <td>{{ $client->contact }}</td>
                    <td>{{ $client->whatsapp }}</td>
                    <td>{{ $client->email }}</td>
                    <td class="text-end"><span class="d-flex justify-content-between">
                    @if (Auth::user()->hasRole('ADMIN'))
                            <a href="{{ route('client.edit', $client) }}" class="btn btn-secondary" title="Modifier le client" >Modifier</a>
                            <form method="POST" action="{{ route('client.destroy', $client) }}" >
                                <!-- CSRF token -->
                                @csrf
                                <input class="btn btn-danger" type="submit" onclick="return confirm('Vous êtes sur?')" value="x Supprimer" >
                            </form>
                    @endhasrole
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $clients->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
        
    </div>
                </div>
            </div>
        </section>

@include('footer')
