<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class Index extends Component
{
    public $clienteId;
    public $nome;
    public $endereco;
    public $telefone;
    public $cpf;
    public $email;

    protected $listeners = [
        'abrirModalEdicao',
        'projetoAtualizar' => 'render',
        'clienteAtualizado' => 'render'
    ];

    public function render()
    {
        $cliente = Cliente::all();
        return view('livewire.cliente.index', compact('cliente'));
    }

    public function abrirModalVizualizar($clienteId)
    {
        $cliente = Cliente::find($clienteId);
        if ($cliente) {
            $this->nome = $cliente->nome;
            $this->endereco = $cliente->endereco;
            $this->telefone = $cliente->telefone;
            $this->cpf = $cliente->cpf;
            $this->email = $cliente->email;
        }
    }

    public function abrirModalExclusao($clienteId)
    {
        $this->clienteId = $clienteId;
    }

    public function abrirModalEdicao($clienteId)
    {
        $this->dispatch('editarCliente', clienteId: $clienteId);
    }

    public function excluir()
    {
        if ($this->clienteId) {
            Cliente::find($this->clienteId)->delete();
        }
    }
}
