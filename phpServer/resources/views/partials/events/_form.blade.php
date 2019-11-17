<div class="form-group">
    <label for="name">Nom de l'évènement :</label>
    <input type="text" name="name" id="name" value="{{ old('name') ?? isset($event) ? $event->name : ''}}" class="form-control" required>
    @error('name')
    <p>{{ $errors->first('name') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description">Description de l'évènement :</label>
    <textarea name="description" id="description"  class="form-control" rows="5"
              required>{{ old('description') ?? isset($event) ? $event->description : ''}}</textarea>
    @error('description')
    <p>{{ $errors->first('description') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="location">Lieu de l'évènement :</label>
    <input type="text" name="location" id="location" value="{{ old('location') ?? isset($event) ? $event->location : ''}}" class="form-control" required>
    @error('location')
    <p>{{ $errors->first('location') }}</p>
    @enderror
</div>

<div class="form-group d-flex flex-column">
    <label for="imageReadyToUpload">Image pour l'évènement</label>
    <input type="file" name="image" id="imageReadyToUpload">
    <img id="imagePreview" src="@isset($event) {{ asset('storage/imagesUploaded/'.$event->image->path) }} @endisset" alt="Prévisualisation de l'image">
    @error('image')
    <p>{{ $errors->first('image') }}</p>
    @enderror
</div>


<div class="form-group">
    <label for="date">Date de l'évènement :</label>
    <input type="date" name="date" id="date" value="{{ old('date', date('Y-m-d')) }}" class="form-control" required>
    @error('date')
    <p>{{ $errors->first('date') }}</p>
    @enderror
</div>

<div class="form-group">
    <label for="price">Prix l'évènement (facultatif) :</label>
    <input type="number" name="price" id="price" value="{{ old('price') ?? isset($event) ? $event->price : ''}}" class="form-control" min="0" max="500">
    @error('price')
    <p>{{ $errors->first('price') }}</p>
    @enderror
</div>


