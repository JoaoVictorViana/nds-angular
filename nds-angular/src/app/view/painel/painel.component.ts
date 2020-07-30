import { Component, OnInit, Output } from '@angular/core';
import { Menu } from '../../interface/menu';
import { Page } from '../../interface/page';
import { voltarPage } from '../page/voltar';
import { paginaInicialPage } from '../page/paginainicial';
import { pessoaPage } from '../page/pessoa';

@Component({
  selector: 'nds-painel',
  templateUrl: './painel.component.html',
  styleUrls: ['./painel.component.css']
})
export class PainelComponent implements OnInit {

  menus: Menu[];
  content: Page;

  constructor() { }

  ngOnInit(): void {
    this.menus = [];
    this.menus.push({title: 'Voltar', icon: 'pencil', page: voltarPage});
    this.menus.push({title: 'Pagina Inicial', icon: 'home', page: paginaInicialPage});
    this.menus.push({title: 'Pessoa', icon: 'pencil', page: pessoaPage});
  }

  receberMensagem(event: Page): void {
    this.content = event;
  }
}
