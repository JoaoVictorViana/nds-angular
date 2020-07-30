import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';
import { Page } from 'src/app/interface/page';
import { Menu } from 'src/app/interface/menu';

@Component({
  selector: 'nds-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {

  @Input('menus') menusPainel: Menu[];
  
  @Output('response') response: EventEmitter<Page> = new EventEmitter<Page>();

  constructor() { }

  ngOnInit(): void {
  }

  changeContainer(page: Page): void {
    let mensagem: Page = page;
    this.response.emit(mensagem);
  }

}
