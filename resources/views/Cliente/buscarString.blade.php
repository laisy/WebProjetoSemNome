@extends('layouts.app')

<script>
function myFunction() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("searchbar");
    filter = input.value.toUpperCase();
    table = document.getElementById("prodsID");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        td2 = tr[i].getElementsByTagName("td")[1];
        if (td2) {
            txtValue2 = td2.textContent || td2.innerText;
            if (txtValue2.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header marker">Lista de produtos</div>

                <div class="card-body">
                  <div class="form-group row">
                      <label class="col-md-4 col-form-label text-md-right label-static">Digite o nome do produto:</label>

                      <div class="col-md-6">
                        <span class="fa fa-search form-control-feedback" id='search-icon'></span>
                        <input type="text" class="form-control input-stl" placeholder="Nome do produto" id='searchbar' onkeyup="myFunction()">
                      </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-12">
                      <button style="float: left"class="final-bt bt-tb"><img class="img-tb"src="{{asset('images/rounded-add-button.png')}}" alt=""></button>
                      <br>
                      <label class="label-static">Adicionar ao carrinho</label>
                    </div>
                  </div>
                  <br>
                    <div class="form-row">
                        <table id="prodsID" class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Produto</th>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Descrição</th>
                                    <th scope="col" class="nome-col">Preço</th>
                                    <th scope="col" class="nome-col">Ações</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($farmacias as $farmacia)
                              @if($farmacia->vitrine)
                                @foreach ($farmacia->vitrine->produto as $prod)
                                  @if($prod->disponivel)
                                <tr>
                                    <td class="nome_reuniao basic-space"><img src="{{asset('storage/' . $prod->imagem)}}" alt="" width="70px"> </td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->descricao}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$prod->preco}}</td>
                                    <td id="coluna-images" class="basic-space">
                                      <button class="btn final-bt bt-tb"><a href="{{route('cliente.carrinho.addprod', ['produto_id' => $prod->id])}}"><img class="img-tb"src="{{asset('images/rounded-add-button.png')}}" alt=""></a></button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="outliner">

                <div class="card-header marker">Lista de Farmacias próximas</div>

                <div class="card-body">
                    <div class="form-row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="nome-col">Nome</th>
                                    <th scope="col" class="nome-col">Bairro</th>
                                    <th scope="col" class="nome-col">Rua</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($farmacias as $farmacia)
                                <tr>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacia->user->nome}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacia->user->endereco->bairro}}</td>
                                    <td class="nome_reuniao basic-space"><br>{{$farmacia->user->endereco->rua}}</td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
@endsection
