import { Component, OnInit, Input, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'nds-sidebar',
  templateUrl: './sidebar.component.html',
  styleUrls: ['./sidebar.component.css']
})
export class SidebarComponent implements OnInit {

  @Input('menus') menusPainel: string[];
  
  @Output('response') response: EventEmitter<string> = new EventEmitter<string>();

  constructor() { }

  ngOnInit(): void {
    
  }

  changeContainer(menu: string): void {
    let mensagem: string = `O menu (${menu}) foi clickado!`;
    this.response.emit(mensagem);
  }

}
