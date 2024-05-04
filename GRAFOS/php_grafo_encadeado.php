<?php

class Node {
    public $vertice;
    public $next;

    public function __construct($v) {
        $this->vertice = $v;
        $this->next = null;
    }
}

class Graph {
    public $numVertices; ##Armazena todos os nos
    public $adjLists; ##Armazena lista de adjacencia

    public function __construct($vertices) { ##REcebe o valor do $vertice e atribui ao $numVertice
        $this->numVertices = $vertices;
        $this->adjLists = array_fill(0, $vertices, null); ##array_fill(StartIndex, NumElementos, Valor)
    }

    public function addEdge($s, $d) {
        // Adiciona aresta de s para d
        $newNode = new Node($d);
        $newNode->next = $this->adjLists[$s];
        $this->adjLists[$s] = $newNode;

        // Adiciona aresta de d para s
        $newNode = new Node($s);
        $newNode->next = $this->adjLists[$d];
        $this->adjLists[$d] = $newNode;
    }

    public function printGraph() {
        for ($v = 0; $v < $this->numVertices; $v++) {
            $temp = $this->adjLists[$v];
            echo "\nvertice $v\n: ";
            while ($temp) {
                echo $temp->vertice . " -> ";
                $temp = $temp->next;
            }
            echo "\n";
        }
    }
}

$graph = new Graph(4);
$graph->addEdge(0, 1);
$graph->addEdge(0, 2);
$graph->addEdge(0, 3);
$graph->addEdge(1, 2);
$graph->printGraph();
