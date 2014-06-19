/*
	Criem uma tabela por vez, 
	na ordem em que aparecem
*/

create database db_tcc;
use db_tcc;

CREATE TABLE tbPessoa(
	idPessoa int auto_increment,
	nome varchar(100),
	email varchar(50),
	senha varchar(300),
	isAdmin tinyint DEFAULT '0',
	dataNasc date,
	instituicao varchar(50),
	telefone int(11),
	
	constraint pk_tbPessoa primary key (idPessoa)
)

CREATE TABLE tbAluno(
	
	idAluno int auto_increment,
	matricula varchar(20),
	turma varchar(10),
	curso varchar(20),
	
	constraint pk_tbAluno primary key (idAluno),
	constraint fk_tbPessoatbAluno foreign key(idAluno) REFERENCES tbPessoa (idPessoa)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbProfessor(
	
	idProfessor int auto_increment,
	siape int(7),
	
	constraint pk_tbProfessor primary key (idProfessor),
	constraint fk_tbPessoatbProfessor foreign key(idProfessor) REFERENCES tbPessoa (idPessoa)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbComprovante(
	
	idComprovante int auto_increment,
	caminho varchar(100),
	nomeOriginal varchar(100),
	nomePadrao varchar(50),
	
	constraint pk_tbComprovante primary key (idComprovante)
)

CREATE TABLE tbDisciplina(
	
	idDisciplina int auto_increment,
	nome varchar(20),

	constraint pk_tbDisciplina primary key (idDisciplina)
)

CREATE TABLE tbDisciplinaProfessor(
	
	idDisciplina int,
	idProfessor int,
	
	constraint pk_tbDisciplinaProfessor primary key (idDisciplina, idProfessor),
	constraint fk_tbDisciplinatbDisciplinaProfessor foreign key(idDisciplina) REFERENCES tbDisciplina (idDisciplina)
	ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_tbProfessortbDisciplinaProfessor foreign key(idProfessor) REFERENCES tbProfessor (idProfessor)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbConteudo(
	
	idConteudo int auto_increment,
	idDisciplina int,
	nome varchar(20),

	constraint pk_tbConteudo primary key (idConteudo),
	constraint fk_tbDisciplinatbConteudo foreign key (idDisciplina) REFERENCES tbDisciplina (idDisciplina)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbTeste(
	
	idTeste int auto_increment,
	dataLimite date,
	valorTeste float,
	numQuestoes int,
	
	constraint pk_tbTeste primary key (idTeste)
)

CREATE TABLE tbAula(
	
	idAula int auto_increment,
	titulo varchar(100),
	senha varchar(100),
	tags text(300),
	idConteudo int,
	idTeste int,
	
	constraint pk_tbAula primary key (idAula),
	constraint fk_tbConteudotbAula foreign key (idConteudo) REFERENCES tbConteudo (idConteudo)
	ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_tbTestetbAula foreign key (idTeste) REFERENCES tbTeste (idTeste)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbPagina(
	
	idPagina int auto_increment,
	idAula int,
	titulo varchar(100),
	
	constraint pk_tbPagina primary key (idPagina),
	constraint fk_tbAulatbPagina foreign key (idAula) REFERENCES tbAula (idAula)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbArquivo(
	
	idArquivo int auto_increment,
	caminho varchar(100),
	nomeOriginal varchar(100),
	nomePadrao varchar(50),
	tamanho int,
	tamanhoMax int,
	idPagina int,
	
	constraint pk_tbArquivo primary key (idArquivo),
	constraint fk_tbPaginatbArquivo foreign key (idPagina) REFERENCES tbPagina (idPagina)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbTexto(
	
	idTexto int auto_increment,
	conteudo longtext,
	idPagina int,
	
	constraint pk_tbTexto primary key (idTexto),
	constraint fk_tbPaginatbTexto foreign key (idPagina) REFERENCES tbPagina (idPagina)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbQuestao(
	
	numQuestao int auto_increment,
	idTeste int,
	descricao text,
	
	constraint pk_tbQuestao primary key (numQuestao),
	constraint fk_tbTestetbQuestao foreign key (idTeste) REFERENCES tbTeste (idTeste)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbAlunoTesteQuestao(
	
	idAluno int,
	idTeste int,
	numQuestao int,
	nota float,
	respostaAluno varchar(50),
	
	constraint pk_tbAlunoTesteQuestao primary key (idAluno, idTeste, numQuestao),
	constraint fk_tbAlunotbAlunoTesteQuestao foreign key(idAluno) REFERENCES tbAluno (idAluno)
	ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_tbTestetbAlunoTesteQuestao foreign key(idTeste) REFERENCES tbTeste (idTeste)
	ON DELETE CASCADE ON UPDATE CASCADE,
	constraint fk_tbQuestaotbAlunoTesteQuestao foreign key(numQuestao) REFERENCES tbQuestao (numQuestao)
	ON DELETE CASCADE ON UPDATE CASCADE
)

CREATE TABLE tbAlternativa(
	
	idAlternativa int auto_increment,
	numQuestao int,
	isRespostaCerta tinyint,
	respostaAluno varchar(50),
	descricao text(300),
	
	constraint pk_tbAlternativa primary key (idAlternativa),
	constraint fk_tbQuestaotbAlternativa foreign key(numQuestao) REFERENCES tbQuestao (numQuestao)
	ON DELETE CASCADE ON UPDATE CASCADE
)




