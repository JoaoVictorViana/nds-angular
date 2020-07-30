import { Component, OnInit, Output } from '@angular/core';

@Component({
  selector: 'nds-painel',
  templateUrl: './painel.component.html',
  styleUrls: ['./painel.component.css']
})
export class PainelComponent implements OnInit {

  menus: string[];
  content: string;

  constructor() { }

  ngOnInit(): void {
    this.menus = [];
    this.menus.push('Voltar');
    this.menus.push('Pagina Inicial');
    this.menus.push('Pessoa');
    this.menus.push('Cadastro');
    this.menus.push('Ajuda');
    this.menus.push('Perfil');
  }

  receberMensagem(event: Event): void {
    this.content = `${event}`;
  }
}
