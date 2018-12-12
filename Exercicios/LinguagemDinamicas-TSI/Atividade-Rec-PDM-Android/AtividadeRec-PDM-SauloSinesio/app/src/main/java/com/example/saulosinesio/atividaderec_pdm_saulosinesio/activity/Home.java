package com.example.saulosinesio.atividaderec_pdm_saulosinesio.activity;

import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.SharedPreferences;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.NavigationView;
import android.support.design.widget.Snackbar;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.view.LayoutInflater;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.example.saulosinesio.atividaderec_pdm_saulosinesio.Fragment.ListaLembretes;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.Fragment.NovoLembrete;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.R;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.clases.Singleton;

public class Home extends AppCompatActivity {

    private TextView etNomeUsuarioMenu;

    // Menu Hamburger
    private NavigationView navigationView;
    private DrawerLayout drawerLayout;
    private ActionBarDrawerToggle actionBarDrawerToggle;

    private SharedPreferences sharedPreferences;

    private FloatingActionButton fab;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.home);

        // Carregando o Menu Hamburger
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setHomeButtonEnabled(true);

        navigationView = findViewById(R.id.menu_navegacao);
        drawerLayout = findViewById(R.id.home);

        // Fab Buttom
        fab = (FloatingActionButton) findViewById(R.id.fabLembrete);
        fab.show();
        fab.setOnClickListener( new View.OnClickListener() {
            @Override
            public void onClick (View v){
                NovoLembrete frag = new NovoLembrete();
                getSupportFragmentManager().beginTransaction().replace(R.id.home_container, frag).commit();
            }
        } );

        // Listener do Menu Hamburger
        navigationView.setNavigationItemSelectedListener(new NavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {

                if(item.isChecked()){ item.setChecked(false); }
                else { item.setChecked(true); }

                drawerLayout.closeDrawers();

                // Botão Cadastro
                if(item.getItemId() == R.id.acao_sair) {
                    Singleton.getInstance().removeAllNotas();
                    sharedPreferences = getSharedPreferences("SaveInfo", MODE_PRIVATE);
                    SharedPreferences.Editor editor = sharedPreferences.edit();
                    editor.remove("nome");
                    editor.remove("senha");
                    editor.apply();

                    Intent i = new Intent(Home.this, Login.class);
                    startActivity(i);
                    finish();
                    return true;
                }

                // Novo Lembrete
                if(item.getItemId() == R.id.acao_novo_lembrete) {
                    NovoLembrete frag = new NovoLembrete();
                    getSupportFragmentManager().beginTransaction().replace(R.id.home_container, frag).commit();
                }

                // Listagem de Lembretes
                if(item.getItemId() == R.id.acao_lista_lembrete) {
                    ListaLembretes frag = new ListaLembretes();
                    getSupportFragmentManager().beginTransaction().replace(R.id.home_container, frag).commit();
                }

                return false;
            }
        });

        actionBarDrawerToggle = new ActionBarDrawerToggle(this, drawerLayout, R.string.openDrawer, R.string.closeDrawer){ };
        drawerLayout.setDrawerListener(actionBarDrawerToggle);
        actionBarDrawerToggle.syncState();

        // Colocando o nome do usuário no Cabeçalho do Menu Hamburguer
        sharedPreferences = getSharedPreferences("SaveInfo", MODE_PRIVATE);
        String nome = sharedPreferences.getString("nome", "Nome");

        LayoutInflater inflater = (LayoutInflater) getSystemService( Context.LAYOUT_INFLATER_SERVICE );
        View view = inflater.inflate(R.layout.menu_cabecalho, null);
        etNomeUsuarioMenu = view.findViewById(R.id.etNomeUsuarioMenu);
        Toast toast = Toast.makeText(Home.this, nome + " + " + etNomeUsuarioMenu.getText(),Toast.LENGTH_SHORT); toast.show();
        etNomeUsuarioMenu.setText(nome);

    }

    /**
     * Capturar ações do Itens do menu
     * @param item
     * @return
     *
     */
    @Override
    public boolean onOptionsItemSelected (MenuItem item) {
        // Menu
        if (actionBarDrawerToggle.onOptionsItemSelected(item)){ return true; }


        // Menu Lateral
        int id = item.getItemId();

        if(id == R.id.acao_deletar_tudo){
            confirmar();
            return true;
        }

        if(id == R.id.acao_sobre){
            Intent i = new Intent(Home.this, Sobre.class);
            startActivity(i);
            return true;
        }

        if(id == R.id.acao_fechar){
            finish();
        }

        // Retorno
        return super.onOptionsItemSelected(item);
    }

    /**
     * Menu Lateral (Carregar XML)
     * @param menu
     * @return
     */
    @Override
    public boolean onCreateOptionsMenu (Menu menu) {
        getMenuInflater().inflate(R.menu.menu_lateral, menu);
        return true;
    }

    private void confirmar () {
        AlertDialog.Builder builder = new AlertDialog.Builder(Home.this);
        builder.setMessage("Deseja deletar todas os lembretes?");
        builder.setTitle("Atenção");
        builder.setCancelable(true);
        builder.setPositiveButton("OK", null);
        AlertDialog dialog = builder.create();
        dialog.show();
    }

    public FloatingActionButton getFab () {
        return (FloatingActionButton) findViewById(R.id.fabLembrete);
    }
}
