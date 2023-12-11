<tbody>
    <tr> 
      {{-- @foreach($places as $place) --}}
      <td>{{ $place->title }}</td>
      <td>{{ $place->created_at }}</td>
      <td>{{ $place->content }}</td>
      <td>{{ $place->priceFrom }}</td>
      <td>{{ $place->priceTo}}</td>
      <td>
          @if( $place->published)
          yes
          @else
          no
          @endif
      </td>
      <td><a href="editPlace/{{ $place->id }}">Edit</a></td>
      <td><a href="placeDetails/{{ $place->id }}">placeDetails</a></td>
      <td><a href="deletePlace/{{ $place->id }}">Delete</a></td>
    </tr>
      {{-- @endforeach --}}
  </tbody>