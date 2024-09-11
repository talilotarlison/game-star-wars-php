<?php
header('Content-Type: text/html; charset=utf-8');

class NaveEspacial {
    public $nome;
    public $combustivel;
    public $velocidade;

    public function __construct($nome, $combustivel, $velocidade) {
        $this->nome = $nome;
        $this->combustivel = $combustivel;
        $this->velocidade = $velocidade;
    }

    public function viajar($distancia) {
        // Implemente a lógica de consumo de combustível e cálculo de tempo de viagem
        echo "Viajando " . $distancia . " anos-luz.\n";
    }
}

// ================== Logica Galaxia e Planetas ==================================

class Planeta {
    public $nome;
    public $descricao;
    public $recursos;
    public $habitantes;
    public $eventos;

    public function __construct($nome, $descricao, $recursos = [], $habitantes = [], $eventos = []) {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->recursos = $recursos;
        $this->habitantes = $habitantes;
        $this->eventos = $eventos;
    }

    public function explorar() {
        echo "Você está explorando " . $this->nome . "\n";
        echo $this->descricao . "\n";

        // Aqui você pode implementar eventos aleatórios, encontros com habitantes, etc.
    }
}

// class sisstema solar
class SistemaSolar {
    public $estrela;
    public $planetas;

    public function __construct($estrela, $planetas = []) {
        $this->estrela = $estrela;
        $this->planetas = $planetas;
    }

    public function viajarPara() {
        // Implemente a lógica de viagem entre planetas aqui
        echo "Sua estrela é :" . $this->estrela . "\nVoce esta viajando para " . $this-> planetas[rand(0,1)]->nome . "\nSua missao agora e vencer os abstaculos e salvar a tripulação da ". $this->estrela;
    }

    public function viajarParaPlaneta($indice) {
        if (isset($this->planetas[$indice])) {
            $planeta = $this->planetas[$indice];
            echo "Viajando para " . $planeta->nome . "\n";
        } else {
            echo "Planeta não encontrado.\n";
        }
    }
}

// Função para criar planetas aleatórios
function criarPlanetaAleatorio($nome) {
    $descricoes = [
        "Um planeta com vastos oceanos e florestas exuberantes.",
        "Um planeta desértico com tempestades de areia constantes.",
        "Um planeta gelado com montanhas de gelo e cavernas profundas.",
        "Um planeta vulcânico com rios de lava e erupções frequentes.",
        "Um planeta gasoso com tempestades elétricas e ventos fortes."
    ];
    $recursos = ["Água", "Minérios", "Gás", "Cristais", "Energia"];
    $habitantes = ["Humanos", "Aliens", "Robôs", "Criaturas Místicas", "Insetos Gigantes"];
    $eventos = ["Tempestade", "Erupção Vulcânica", "Invasão Alienígena", "Descoberta de Ruínas Antigas", "Fenômeno Cósmico"];

    return new Planeta(
        $nome,
        $descricoes[array_rand($descricoes)],
        array_rand(array_flip($recursos), 2),
        array_rand(array_flip($habitantes), 2),
        array_rand(array_flip($eventos), 2)
    );
}

// Criando 5 planetas aleatórios
$planetas = [
    criarPlanetaAleatorio("Planeta Fenix"),
    criarPlanetaAleatorio("Planeta Terra"),
    criarPlanetaAleatorio("Planeta Orizon"),
    criarPlanetaAleatorio("Planeta Marte"),
    criarPlanetaAleatorio("Planeta Vucano"),
    criarPlanetaAleatorio("Planeta Obim")
];


// Criando 3 sistemas solares com estrelas da Via Láctea
$sistemaSolarEstrela = [
    new SistemaSolar("Estrela Alpha", [$planetas[rand(0,5)], $planetas[rand(0,5)]]),
    new SistemaSolar("Estrela Beta", [$planetas[rand(0,5)], $planetas[rand(0,5)]]),
    new SistemaSolar("Estrela Gamma", [$planetas[rand(0,5)],$planetas[rand(0,5)]])
];

// teste realizados
print_r($planetas[1]);

print_r($sistemaSolarEstrela[rand(0,2)]->viajarPara());

// ================== Logica criação de inimigos inimigo ==================================

// class que cria os inimigos
class Inimigo {
    public $nome;
    public $ataque;
    public $defesa;
    public $vida;

    public function __construct($nome, $ataque, $defesa, $vida) {
        $this->nome = $nome;
        $this->ataque = $ataque;
        $this->defesa = $defesa;
        $this->vida = $vida;
    }

    public function atacar($alvo) {
        $dano = $this->ataque - $alvo->defesa;
        $alvo->vida -= $dano;
        echo $this->nome . " atacou " . $alvo->nome . " por " . $dano . " pontos de dano.\n";
    }
}

// inimigos por fase do jogo

// Array de inimigos nível fácil
$inimigos_facil = [
    new Inimigo("Alien Verde", 3, 2, 5),
    new Inimigo("Robô Espacial", 2, 3, 6),
    new Inimigo("Inseto Gigante", 4, 1, 4),
    new Inimigo("Mutante Lunar", 3, 3, 5),
    new Inimigo("Parasita Cósmico", 2, 2, 6)
];

// Array de inimigos nível médio
$inimigos_medio = [
    new Inimigo("Guerreiro Estelar", 5, 4, 7),
    new Inimigo("Androide Assassino", 6, 3, 6),
    new Inimigo("Predador Galáctico", 7, 2, 8),
    new Inimigo("Ser de Plasma", 5, 5, 7),
    new Inimigo("Caçador de Asteroides", 6, 4, 6)
];

// Array de inimigos nível difícil
$inimigos_dificil = [
    new Inimigo("Senhor das Trevas Cósmicas", 9, 8, 10),
    new Inimigo("Titã Estelar", 8, 9, 9),
    new Inimigo("Devastador de Mundos", 10, 7, 10),
    new Inimigo("Imperador Alienígena", 9, 9, 9),
    new Inimigo("Colosso Espacial", 8, 8, 10)
];

$fases_game = [
    $inimigos_facil,
    $inimigos_medio,
    $inimigos_dificil
];

// class que criação do personagem do game
class Personagem {
    public $nome;
    public $vida;
    public $xp;
    public $raca;
    public $planeta;

    public function __construct($nome,$raca,$planeta) {
        $this->nome = $nome;
        $this->vida = 100;
        $this->xp = 0;
        $this->raca = $raca;
        $this->planeta = $planeta;
    }

    public function getNome() {
        // Implemente a lógica 
        echo "Você é conhecido no universo como " . $this->nome . "\n";
    }
    public function getVida() {
        // Implemente a lógica 
        echo "Vida Atual ----------------------------------". $this->vida . "\n";
    }

    public function getXp() {
        // Implemente a lógica 
        echo "Xp Atual --------------------------------------". $this->xp . "\n";
    }
    public function getRaca() {
        // Implemente a lógica 
        echo "Pelo visto você pertence a raça " . $this->raca .".\n" ;
    }
    public function getPlaneta() {
        // Implemente a lógica 
        echo "Seu planeta natal é " . $this->planeta . ".\n";
    }

    // emplementar o metodo de ganhar vida
    public function ganharVida($vidaPorVitoria) {
        // Implemente a lógica 
        $this->vida +=  $vidaPorVitoria;
        echo "Ganhou " . $vidaPorVitoria . " de Vida pela vitoria: " . $this->vida . ".\n";
    }
    // emplementar o metodo de perder vida
    public function perdeVida($vidaPorDerrota) {
        // Implemente a lógica 
        $this->vida -=  $vidaPorDerrota;
        echo "Perdeu ". $vidaPorDerrota . " pela Derrota: " . $this->vida . ".\n";
    }
    // emplementar o metodo de ganhar xp
    public function ganharXp($xpPorVitoria) {
        // Implemente a lógica 
        $this->xp +=  $xpPorVitoria;
        echo "Ganhou " .$xpPorVitoria . " mais XP pela conquista: " . $this->xp . ".\n";
    }

    // emplementar o metodo de perder xp
    public function perdeXp($xpPorDerrota) {
        // Implemente a lógica 
        $this->xp -=  $xpPorDerrota;
        echo "Perdei ".$xpPorDerrota . " pela Derrota: " . $this->xp . ".\n";
    }
}

// função que coleta dados do usuario
function criarPersonagem() {
    echo "Digite o nome do seu personagem: ";
    $nome = readline();

    echo "Escolha sua raça (humano, vulcano): ";
    $raca = readline();

    echo "Escolha seu Planetas de origem: ";
    $planeta = readline();
    // ... mais opções de escolha e atribuição de estatísticas

    return [
        'nome' => $nome,
        'raca' => $raca,
        'planeta' =>  $planeta,
        // ... outras estatísticas
    ];
}

// informações do jogador
function informacoesPersonagem($jogador){
    echo "\n\n";
    echo  $jogador->getVida();
    echo  $jogador->getXp();
    echo "Todas suas infomações estao salva em nossa base segura.\n";
    Echo $jogador->getNome(). $jogador->getRaca() . $jogador->getPlaneta();
}

// logo do game 
function logo(){
    echo "                                                     \n";
    echo "     *       *       *           *               *      \n";
    echo "  *     *       *       *           *                  \n";
    echo "     *       *       *                                \n";
    echo "  ____  _             __        __            \n";
    echo " / ___|| |_ __ _ _ __ \\ \\      / /_ _ _ __ ___ \n";
    echo " \\___ \\| __/ _` | '__| \\ \\ /\\ / / _` | '__/ _ \\\n";
    echo "  ___) | || (_| | |     \\ V  V / (_| | | |  __/\n";
    echo " |____/ \\__\\__,_|_|      \\_/\\_/ \\__,_|_|  \\___|\n";
    echo "                                              \n";
    echo "                                                     \n";
    echo "     *       *       *          *                      \n";
    echo "  *     *       *       *                    *         \n";
    echo "     *       *       *         *                       \n";
    echo "\n\n";
}

// descrição e obejtivo do jogo
function descricaoGame(){
    echo "************* StarWare uma aventura pelo espaço....************\n";
    echo "\n\n";
    echo "==> Em um futuro distante, a sua galáxia está à beira do colapso.\n 
    Facções rivais lutam pelo controle de recursos valiosos e territórios\n
    estratégicos e estão prestes a dominar a sua galixia. Nesse Conflito\n
    Galáctico, você assume o comando de uma frota espacial e deve liderar\n
    suas forças em batalhas épicas para garantir a sobrevivência e a tambem\n
    supremacia de sua sua especie no universo.\n";
    echo "\n\n";
    echo "=> Seu objeetivo e sair da galaxia, antes de ser dominada, para\n
    perpetuar sua especie na imensa vastidão do universo.\n";
    echo "\n\n";   
    echo "=>Você acaba de ser convocado e sera o pilotor lider da sua nava, \n
    seu obejtivo e salvar a tripulação.\n";
    echo "\n\n";  
    echo "=> Cadastre suas informações em nossa base para dar\n
    inicio a sua aventura.\n";
    echo "\n\n";
}

// runtime do game
function runGame($fases_game,$sistemaSolarEstrela){

    logo();
    descricaoGame();
    $personagem = criarPersonagem();
    $player = new Personagem($personagem["nome"],$personagem["raca"],$personagem["planeta"]);
    informacoesPersonagem($player);
    echo "\n\n";
    $max = sizeof($fases_game);
    for ($i = 0; $i < $max; $i++) {
        $sistemaSolarEstrela[$i]->viajarPara();
        echo "\n\n";
        $maxInimigos = sizeof($fases_game[$i]);
        for ($f = 0; $f < $maxInimigos; $f++) {
            $fase =  $i + 1 ;
            echo "\n\n";
            if($player->vida > 1){
                echo "Voce esta na Fase ".$fase. " do jogo, Boa sorte na aventura.\n" ;
                if($i == 0 ){
                    echo "Voce esta preste a enfrenta um " . $fases_game[$i][$f]->nome .".\n";
                    echo "Voce deve adivinha o ataque do inimigo entre com valor de 1 a 4\n";
                    $ataquePalyer = readline();
                    if($fases_game[$i][$f]->ataque == $ataquePalyer ){
                        echo "Parabens vc derrotu o mostro e avançou de nivel.\n";
                        echo "Vamos para sua proxima missao!!\n";
                        echo ".................................\n";
                        if($player->vida <= 97){
                            $player->ganharVida(5);
                        }
                        $player->ganharXp(15);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    }else{
                        echo "Você perdeu a batalha , mais ainda tem vida para proxima missao!!\n";
                        echo ".................................\n";
                        $player->perdeVida(20);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    };
                }elseif($i == 1){
                    echo "Voce esta preste a enfrenta um " . $fases_game[$i][$f]->nome .".\n";
                    echo "Voce deve adivinha o ataque do inimigo entre com valor de 1 a 7\n";
                    $ataquePalyer = readline();
                    if($fases_game[$i][$f]->ataque == $ataquePalyer ){
                        echo "Parabens vc derrotu o mostro e avançou de nivel.\n";
                        echo "Vamos para sua proxima missao!!\n";
                        echo ".................................\n";
                        if($player->vida <= 97){
                            $player->ganharVida(10);
                        }
                        $player->ganharXp(20);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    }else{
                        echo "Você perdeu a batalha , mais ainda tem vida para proxima missao!!\n";
                        echo ".................................\n";
                        $player->perdeVida(25);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    };
                }else{
                    echo "Voce esta preste a enfrenta um " . $fases_game[$i][$f]->nome .".\n";
                    echo "Voce deve adivinha o ataque do inimigo entre com valor de 1 a 10\n";
                    $ataquePalyer = readline();
                    if($fases_game[$i][$f]->ataque == $ataquePalyer ){
                        echo "Parabens vc derrotu o mostro e avançou de nivel.\n";
                        echo "Vamos para sua proxima missao!!\n";
                        echo ".................................\n";
                        if($player->vida <= 97){
                            $player->ganharVida(5);
                        }
                        $player->ganharXp(30);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    }else{
                        echo "Você perdeu a batalha , mais ainda tem vida para proxima missao!!\n";
                        echo ".................................\n";
                        $player->perdeVida(30);
                        informacoesPersonagem($player);
                        echo ".................................\n";
                    };
                }
            }else{
                echo "Fim da missao, sua nave e sua tripulação foram destruida.\n";
                echo "Voce fracossou em salvar sua especie\n";
                echo "FIM DO JOGO.....\n";
                break;
            }
  
        }

    }
    
    
}

// start game player
function starGame($fases_game, $sistemaSolarEstrela){
    logo();
    echo "============ Bem-vindo ao mundo de StarWare....=================\n";
    echo "\n\n";
    echo "==> Aperte S para inicia sua aventura pela galaxia.\n";
    echo "<== Aperte N para cancelar.\n";
    echo "\n\n";
    $start = readline();
    if($start == "S" ||$start == "s" ){
        runGame($fases_game, $sistemaSolarEstrela);
    }else{
        echo "==> Sua missao foi de StarWare foi cancelada....\n";
        echo "==> Nos vemos nas proxima haventuras.\n";
        echo "\n"; 
    }
}

// inicia o jogo
starGame($fases_game, $sistemaSolarEstrela);
