<?php

class HeapMax {
    private $nos;
    private $heap;

    public function __construct() {
        $this->nos = 0;
        $this->heap = [];
    }
    public function adiciona_no($u) {
        $this->heap[] = $u;
        $this->nos++;
        $f = $this->nos;
        while (true) {
            if ($f == 1) {
                break;
            }
            $p = intval($f / 2);
            if ($this->heap[$p-1] >= $this->heap[$f-1]) { // <= HeapMin
                break;
            } else {
                list($this->heap[$p-1], $this->heap[$f-1]) = array($this->heap[$f-1], $this->heap[$p-1]);
                $f = $p;
            }
        }
    }
    public function mostra_heap_vetor() {
        echo "A estrutura heap é a seguinte:\n";
        $nivel = intval(log($this->nos, 2));
        $a = 0;
        for ($i = 0; $i < $nivel; $i++) {
            for ($j = 0; $j < pow(2, $i); $j++) {
                echo $this->heap[$a] . '  ';
                $a++;
            }
            echo " ";
        }
        for ($i = 0; $i < $this->nos - $a; $i++) {
            echo $this->heap[$a] . '  ';
            $a++;
        }
        echo " ";
    }
    public function mostra_heap_arvore() {
        echo "A estrutura heap é a seguinte:\n";
        $nivel = intval(log($this->nos, 2));
        $a = 0;
        for ($i = 0; $i < $nivel; $i++) {
            for ($j = 0; $j < pow(2, $i); $j++) {
                echo $this->heap[$a] . '  ';
                $a++;
            }
            echo "\n";
        }
        for ($i = 0; $i < $this->nos - $a; $i++) {
            echo $this->heap[$a] . '  ';
            $a++;
        }
        echo "\n";
    }
    public function remove_no() {
        $x = $this->heap[0];
        $this->heap[0] = $this->heap[$this->nos - 1];
        array_pop($this->heap);
        $this->nos--;
        $p = 1;
        while (true) {
            $f = 2 * $p;
            if ($f > $this->nos) {
                break;
            }
            if ($f + 1 <= $this->nos) {
                if ($this->heap[$f] > $this->heap[$f-1]) { // < se for HeapMin
                    $f++;
                }
            }
            if ($this->heap[$p-1] >= $this->heap[$f-1]) { // <= se for HeapMin
                break;
            } else {
                list($this->heap[$f-1], $this->heap[$p-1]) = array($this->heap[$p-1], $this->heap[$f-1]);
                $p = $f;
            }
        }
        return $x;
    }
    public function tamanho() {
        return $this->nos;
    }
    public function maior_elemento() {
        if ($this->nos != 0) {
            return $this->heap[0];
        }
        return 'A árvore está vazia';
    }
    public function filho_esquerda($i) {
        if ($this->nos >= 2*$i) {
            return $this->heap[2*$i - 1];
        }
        return 'Esse nó não tem filho!';
    }
    public function filho_direita($i) {
        if ($this->nos >= 2*$i+1) {
            return $this->heap[2*$i];
        }
        return 'Esse nó não tem filho à direita!';
    }
    public function pai($i) {
        return $this->heap[intval($i / 2)];
    }
}

$h = new HeapMax();

while (true) {
    echo "\nEscolha uma opção:\n";
    echo "1. Adicionar nó\n";
    echo "2. Remover nó\n";
    echo "3. Mostrar heap em VETOR\n";
    echo "4. Tamanho do heap\n";
    echo "5. Maior elemento\n";
    echo "6. Filho à esquerda\n";
    echo "7. Filho à direita\n";
    echo "8. Mostrar Heap ARVORE\n";
    echo "8. Sair\n";

    echo "Opção: ";
    $opcao = trim(fgets(STDIN));

    switch ($opcao) {
        case '1':
            echo "Digite o valor do nó a ser adicionado: ";
            $valor = trim(fgets(STDIN));
            $h->adiciona_no($valor);
            break;
        case '2':
            $elemento_removido = $h->remove_no();
            echo "Elemento removido: $elemento_removido\n";
            break;
        case '3':
            $h->mostra_heap_vetor();
            break;
        case '4':
            echo "Tamanho do heap: " . $h->tamanho() . "\n";
            break;
        case '5':
            echo "Maior elemento: " . $h->maior_elemento() . "\n";
            break;
        case '6':
            echo "Digite o índice do nó: ";
            $indice = trim(fgets(STDIN));
            echo "Filho à esquerda: " . $h->filho_esquerda($indice) . "\n";
            break;
        case '7':
            echo "Digite o índice do nó: ";
            $indice = trim(fgets(STDIN));
            echo "Filho à direita: " . $h->filho_direita($indice) . "\n";
            break;
        case '8':
            $h->mostra_heap_arvore();
            break;
        case '9':
            exit("Encerrando o programa.\n");
        default:
            echo "Opção inválida. Tente novamente.\n";
    }
}