extends StaticBody2D

var flip = true #Quando deve ir para um lado e outro
var possicao_inicial
var possicao_final
var velocidade = 0.3

# Called when the node enters the scene tree for the first time.
func _ready():
	$Sprite.play("Walk")
	possicao_inicial = $".".position.x #possicao incial do mostro
	possicao_final = possicao_inicial + 70

#Loop do jogo para andar o mostro
func _process(delta):
	
	if(possicao_inicial <= possicao_final and flip):
		$".".position.x += velocidade
		$Sprite.flip_h = false
		if($".".position.x >= possicao_final):
			flip = false
			
	if($".".position.x >= possicao_inicial and !flip):
		$".".position.x -=  velocidade
		$Sprite.set_flip_h(true)
		if($".".position.x <= possicao_inicial):
			flip = true
		
		
func dano():
	#print("Morreu")
	$".".queue_free() # Some o corpo

