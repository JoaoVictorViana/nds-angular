import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { PainelComponent } from './view/painel/painel.component';
import { SidebarComponent } from './view/sidebar/sidebar.component';
import { PusherComponent } from './view/pusher/pusher.component';
import { NavbarComponent } from './view/navbar/navbar.component';
import { ContainerComponent } from './view/container/container.component';


@NgModule({
  declarations: [
    PainelComponent,
    SidebarComponent,
    PusherComponent,
    NavbarComponent,
    ContainerComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [PainelComponent]
})
export class AppModule { }
