package com.example.saulosinesio.atividaderec_pdm_saulosinesio.Fragment;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.v4.app.Fragment;
import android.support.v7.app.AlertDialog;
import android.support.v7.widget.CardView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;
import android.widget.Toast;

import com.example.saulosinesio.atividaderec_pdm_saulosinesio.R;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.activity.Home;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.clases.Nota;
import com.example.saulosinesio.atividaderec_pdm_saulosinesio.clases.Singleton;

import org.w3c.dom.Text;

import java.util.List;

public class ListaLembretes extends Fragment {

    private ViewGroup cardViewGroup;
    private FloatingActionButton fab;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {

        // Escondendo o Fab Buttom
        fab = ((Home)getActivity()).getFab();
        fab.show();

        View view = inflater.inflate(R.layout.lista_lembretes, container, false);

        cardViewGroup = view.findViewById(R.id.containerLista);

        List<Nota> notas = Singleton.getInstance().getListNotas();

       if (notas.size() > 0) {
           for ( int i = 0; i < notas.size(); i++) {
               addItem(notas.get(i).getTitulo(), notas.get(i).getNota(), notas.get(i).getIndex());
           }
       }

        return view;
    }

    /**
     * Cria um CardView
     * @param titulo
     * @param descricao
     */
    private void addItem (String titulo, String descricao, int index) {
        CardView cardView = (CardView) getLayoutInflater().inflate(R.layout.cardview_notas, cardViewGroup, false);

        TextView etTitulo = cardView.findViewById(R.id.etTitulo);
        TextView etDescricao = cardView.findViewById(R.id.etDescricao);
        TextView tvIndex = cardView.findViewById(R.id.tvIndex);

        etTitulo.setText(titulo);
        etDescricao.setText(descricao);
        tvIndex.setText(Integer.toString(index ));

        cardViewGroup.addView(cardView);
    }

    private void confirmar () {
        AlertDialog.Builder builder = new AlertDialog.Builder(ListaLembretes.super.getContext());
        builder.setMessage("Deseja deletar este lembrete?");
        builder.setTitle("Atenção");
        builder.setCancelable(true);
        builder.setPositiveButton("OK", null);
        AlertDialog dialog = builder.create();
        dialog.show();
    }
}
