<?PHP
abstract class Atracao {
    private $id;
    private $nome;
    private $dataInclusao;
    private $endereco;
    private $latitude;
    private $longitude;
    private $linkMapa;
    private $website;
    private $vizualizacoes;
    private $idUsuario;
    private $idEstacao;
    public $listaComentarios;
    public $listaAvaliacoes;
    public $listaVideos;
    public $listaImagens;
    
    /*
    protected function __construct ($id=null, $nome=null, $dataInclusao=null, $endereco=null,
    								$latitude=null, $longitude=null, $linkMapa=null, $website=null,
    								$vizualizacoes=null, $idUsuario=null, $idEstacao=null) 
    {
    	$this->id = $id;
    	$this->nome = $nome;
    	$this->dataInclusao = $dataInclusao;
    	$this->endereco = $endereco;
    	$this->latitude = $latitude;
    	$this->longitude = $longitude;
    	$this->linkMapa = $linkMapa;
    	$this->website = $website;
    	$this->vizualizacoes = $vizualizacoes;
    	$this->idUsuario = $idUsuario;
    	$this->idEstacao = $idEstacao;
    }
	*/

    // getters
    public function getId() {
		return $this->id;
	}
	
	public function getNome() {
		return $this->nome;
	}
	
	public function getDataInclusao() {
		return $this->dataInclusao;
	}
	
	public function getEndereco() {
		return $this->endereco;
	}
	
	public function getLatitude() {
		return $this->latitude;
	}
	
	public function getLongitude() {
		return $this->longitude;
	}
    
    public function getLinkMapa() {
		return $this->linkMapa;
	}

	public function getWebsite() {
		return $this->website;
	}
    
    public function getVizualizacoes() {
		return $this->vizualizacoes;
	}
	
    public function getIdUsuario() {
		return $this->idUsuario;
	}

    public function getIdEstacao() {
		return $this->idEstacao;
	}

    
    // setters
	public function setId($id) {
		$this->id = $id;
	}
	
	public function setNome($nome) {
		$this->nome = $nome;
	}
	
	public function setDataInclusao($dataInclusao) {
		$this->dataInclusao = $dataInclusao;
	}
	
	public function setEndereco($endereco) {
		$this->endereco = $endereco;
	}
	
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}
	
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}
    
    public function setLinkMapa($linkMapa) {
		$this->linkMapa = $linkMapa;
	}

	public function setWebsite($website) {
		$this->website = $website;
	}
    
    public function setVizualizacoes($vizualizacoes) {
		return $this->vizualizacoes = $vizualizacoes;
	}
	
	public function setIdUsuario($idUsuario) {
		$this->idUsuario = $idUsuario;
	}
    
    public function setIdEstacao($idEstacao) {
		$this->idEstacao = $idEstacao;
	}
	
}
  
?>
