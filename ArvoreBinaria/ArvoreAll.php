<?php

class Node
{
    public $data;
    public $esquerda;
    public $direita;

    public function __construct($data)
    {
        $this->data = $data;
        $this->direita = null;
        $this->esquerda = null;
    }
}
class ArvoreBinaria
{
    public $root; ## Armazena nó raiz

    public function __construct($data = null, $node = null)
    {
        if ($node) {
            $this->root = $node;
        } elseif ($data) {
            $node = new Node($data);
            $this->root = $node;
        } else {
            $this->root = null;
        }
    }

    public function inOrden($node = null)
    {
        if ($node === null) { ## Se o no chamado for null, entao atribui ao root da raiz
            $node = $this->root;
        }
        if ($node->esquerda !== null) {
            $this->inOrden($node->esquerda); #Recursividade
        }
        echo $node->data . " ";
        if ($node->direita !== null) {
            $this->inOrden($node->direita); #Recursividade
        }
    }

    public function preOrdem($node) # Todos a esquerda e depois a direita
    {
        if ($node != null) {
            echo $node->data . " ";
            $this->preOrdem($node->esquerda);
            $this->preOrdem($node->direita);
        }
    }

    function posOrdem($node) #Exibe todas da esquerda, depois da direita e por fim o root
    {
        if ($node != null) {
            $this->posOrdem($node->esquerda);
            $this->posOrdem($node->direita);
            echo $node->data . " ";
        }
    }

    function minValor($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->esquerda !== null) { ##Pesquisa sempre pelo valor a esquerda
            $node = $node->esquerda;
        }
        return $node->data; #Retorna o ultimo valor a esquerda.
    }

    function maxVAlor($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        while ($node->direita !== null) {
            $node = $node->direita;
        }
        return $node->data;
    }

    function altura($node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        $alesquerda = 0;
        $aldireita = 0;
        if ($node->esquerda !== null) {
            $alesquerda = $this->altura($node->esquerda);
        }
        if ($node->direita !== null) {
            $aldireita = $this->altura($node->direita);
        }
        if ($aldireita > $alesquerda) {
            return $aldireita + 1;
        }
        return $alesquerda + 1;
    }

    function removerNo($valorDel, $node = null)
    {
        if ($node === null) {
            $node = $this->root;
        }
        if ($node === null) {
            return $node;
        }
        if ($valorDel < $node->data) {
            $node->esquerda = $this->removerNo($valorDel, $node->esquerda);
        } elseif ($valorDel > $node->data) {
            $node->direita = $this->removerNo($valorDel, $node->direita);
        } else {
            if ($node->esquerda === null) {
                return $node->direita;
            } elseif ($node->direita === null) {
                return $node->esquerda;
            } else {
                // Substituto é o sucessor do valor a ser removido
                $substitui = $this->minValor($node->direita);
                // Ao invés de trocar a posição dos nós, troca o valor
                $node->data = $substitui;
                // Depois, removerNo o substituto da subárvore à direita
                $node->direita = $this->removerNo($substitui, $node->direita);
            }
        }
        return $node;
    }

    function contaFolhas($node = null)
    {
        if ($node === null) {
            return 0;
        } elseif ($node->esquerda === null && $node->direita === null) {
            return 1;
        } else {
            return $this->contaFolhas($node->esquerda) + $this->contaFolhas($node->direita);
        }
    }

    function contaNo($node = null)
    {
        if ($node === null) {
            return 0;
        }
        // Continua a contagem dos nós na árvore binária
        return 1 + $this->contaNo($node->esquerda) + $this->contaNo($node->direita);
    }

    function buscarNo($valorBuscar, $node = null, $pai = null)
    {
        if ($node === null) {
            return null;
        }
        if ($valorBuscar == $node->data) { // Valor encontrado
            return ["no" => $node, "pai" => $pai];
        } elseif ($valorBuscar < $node->data) {
            return $this->buscarNo($valorBuscar, $node->esquerda, $node);// Aqui o nó atual é passado como o pai na chamada recursiva à esquerda
        } else {
            return $this->buscarNo($valorBuscar, $node->direita, $node);// Aqui o nó atual é passado como o pai na chamada recursiva à direita
        }
    }

    /*    function contaSubArvores($node = null)
        {
            if ($node === null) {
                return 0;
            } else {
                return 1 + $this->contaSubArvores($node->esquerda) + $this->contaSubArvores($node->esquerda);
            }
        }*/
}
class PesquisaBinaria extends ArvoreBinaria
{
    public function inserir($valorInserir)
    {
        $rasNoPai = null;
        $x = $this->root;
        while ($x !== null) {
            $rasNoPai = $x;
            if ($valorInserir < $x->data) {
                $x = $x->esquerda;  #Recebe valor a esquerda da arvore
            } else {
                $x = $x->direita; # Recebe valor a direita da arvore
            }
        }
        if ($rasNoPai === null) {
            $this->root = new Node($valorInserir);
        } elseif ($valorInserir < $rasNoPai->data) {
            $rasNoPai->esquerda = new Node($valorInserir);
        } else {
            $rasNoPai->direita = new Node($valorInserir);
        }
    }
}



$arvore = new PesquisaBinaria(50);
$arvore->inserir(15);
$arvore->inserir(67);
$arvore->inserir(10);
$arvore->inserir(16);
$arvore->inserir(52);
$arvore->inserir(70);
$arvore->inserir(8);
$arvore->inserir(76);


do {
    echo "\n\n\t########### INFORME O NUMERO DA OPCAO ############\n\n";
    echo "1 - Inserir Nó: \n";
    echo "2 - Exibir Arvore \n";
    echo "3 - Buscar Nó \n";
    echo "4 - Exibir em pré-ordem\n";
    echo "5 - Exibir em ordem\n";
    echo "6 - Exibir em pós-ordem\n";
    echo "7 - Altura da árvore\n";
    echo "8 - Total de nós da árvore\n";
    echo "9 - Total de folhas da árvore\n";
    echo "10 - Total de sub-árvores\n";
    echo "11 - Remover Nó\n";
    echo "12 - Listar Maior Valor\n";
    echo "13 - Listar Menor Valor\n";
    echo "14 - Sair do programa!!\n";

    $opcao = readline("Digite o numero da opção: ");

    switch ($opcao) {
        case 1:
            echo "Você selecionou a opção 1 - Inserir Nó!\n";
            $valorInserir = readline("Qual é o novo nó: ");
            $arvore->inserir($valorInserir);
            break;
        case 2:
            echo "Você selecionou a opção 2 - Exibir Árvore!\n";
            break;
        case 3:
            echo "Você selecionou a opção 3 - Buscar Nó\n";
            $valorBuscar = readline("Qual valor deseja encontrar: ");
            $resultado = $arvore->buscarNo($valorBuscar, $arvore->root);
            if ($resultado != null) {
                $no = $resultado["no"];
                $pai = $resultado["pai"];
                ##var_dump($pai);
                echo "Valor solicitado encontrado: " . $no->data . "\n";
                if ($pai == null) {
                    echo "O valor solicitado é o nó raiz.\n";
                } else {
                    echo "O nó pai é: " . $pai->data . "\n";
                }
                #Pesquisa Filhos do no consultado
                if ($no->esquerda != null) {
                    echo "Filho à esquerda: " . $no->esquerda->data . "\n";
                }
                if ($no->direita != null) {
                    echo "Filho à direita: " . $no->direita->data . "\n";
                }
            } else {
                echo "Não encontramos o valor $valorBuscar\n";
            }
            break;
        case 4:
            echo "Você selecionou a opção 4 - Pre-Ordem\n";
            $arvore->preOrdem($arvore->root) . PHP_EOL;
            break;
        case 5:
            echo "Você selecionou a opção 5 - Ordem\n";
            $arvore->inOrden($arvore->root) . PHP_EOL;
            break;
        case 6:
            echo "Você selecionou a opção 6 - Exibir Pós-Ordem\n";
            $arvore->posOrdem($arvore->root) . PHP_EOL;
            break;
        case 7:
            echo "Você selecionou a opção 7 - Altura da Árvore!\n";
            echo $arvore->altura();
            break;
        case 8:
            echo "Você selecionou a opção 8 - Total de nós\n";
            echo $arvore->contaNo($arvore->root);
            break;
        case 9:
            echo "Você selecionou a opção 9 - Total de folhas\n";
            echo $arvore->contaFolhas($arvore->root);
            break;
        case 10:
            echo "Você selecionou a opção 10 - Total de Sub-Árvores\n";
            echo $arvore->contaSubArvores($arvore->root);
            break;
        case 11:
            echo "Você selecionou a opção 11 - Remover Nó\n";
            $valorDel = readline("Informe valor para remover da árvore: ");
            $arvore->removerNo($valorDel);
            echo "Nó Removido com sucesso!\n";
            break;
        case 12:
            echo "Você selecionou a opção 12 - Mostrar maior valor\n";
            echo $arvore->maxVAlor() . PHP_EOL;
            break;
        case 13:
            echo "Você selecionou a opção 13 - Mostrar menor valor\n";
            echo $arvore->minValor() . PHP_EOL;
            break;
        case 14:
            echo "SAINDO DO PROGRAMA....\n";
            break;
        default:
            echo "Opção invalida";
    }

} while ($opcao != 14);

