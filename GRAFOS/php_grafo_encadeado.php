<?php

class Node {
    public $vertex;
    public $next;

    public function __construct($v) {
        $this->vertex = $v;
        $this->next = null;
    }
}

class Graph {
    public $numVertices;
    public $adjLists;

    public function __construct($vertices) {
        $this->numVertices = $vertices;
        $this->adjLists = array_fill(0, $vertices, null);
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
            echo "\nVertex $v\n: ";
            while ($temp) {
                echo $temp->vertex . " -> ";
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

?>
